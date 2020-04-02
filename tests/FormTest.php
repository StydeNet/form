<?php

namespace Tests;

class FormTest extends TestCase
{
    /** @test */
    function renders_a_form_with_get_method()
    {
        $this->assertTemplateRenders(
            '<form method="get"></form>',
            '<x-form></x-form>'
        );
    }

    /** @test */
    function renders_a_form_with_post_method()
    {
        $this->assertTemplateRenders(
            sprintf('<form method="post">%s</form>', $this->csrfField()),
            '<x-form method="post"></x-form>'
        );
    }

    protected function csrfField()
    {
        $this->startSession();

        return sprintf('<input type="hidden" name="_token" value="%s">', $this->app['session']->token());
    }

    /**
     * @test
     * @dataProvider spoofedMethods
     */
    function renders_a_form_with_put_method($method)
    {
        $this->assertTemplateRenders(
            sprintf('<form method="post">%s<input type="hidden" name="_method" value="%s"></form>', $this->csrfField(), $method),
            sprintf('<x-form method="%s"></x-form>', $method)
        );
    }

    public function spoofedMethods()
    {
        return [
            ["put"],
            ["patch"],
            ["delete"],
        ];
    }

    protected function assertTemplateRenders($expectedHtml, $actualTemplate)
    {
        file_put_contents(__DIR__.'/views/'.md5($actualTemplate).'.blade.php', $actualTemplate);

        $this->app->view->addNamespace('_test', __DIR__.'/views/');

        $this->assertSame(
            $expectedHtml,
            $this->removeExtraSpaces($this->app->view->make('_test::'.md5($actualTemplate))->toHtml())
        );
    }

    protected function removeExtraSpaces(string $html)
    {
        return trim(preg_replace('/\s{2,}/', '', $html));
    }
}
