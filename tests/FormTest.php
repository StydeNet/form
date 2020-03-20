<?php

namespace Tests;

use Illuminate\Support\Facades\Session;

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
        Session::start();

        $this->assertTemplateRenders(
            sprintf('<form method="post"><input type="hidden" name="_token" value="%s"></form>', Session::token()),
            '<x-form method="post"></x-form>'
        );
    }

    /** @test */
    function renders_a_form_with_put_method()
    {
        $this->markTestIncomplete('Complete test!');

        $this->assertTemplateRenders(
            '<form method="post"><input type="hidden" name="_method" value="put"></form>',
            '<x-form method="put"></x-form>'
        );
    }

    /** @test */
    function renders_a_form_with_patch_method()
    {
        $this->markTestIncomplete('Complete test!');

        $this->assertTemplateRenders(
            '<form method="post"><input type="hidden" name="_method" value="patch"></form>',
            '<x-form method="patch"></x-form>'
        );
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
