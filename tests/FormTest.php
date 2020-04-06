<?php

namespace Tests;

class FormTest extends TestCase
{
    /** @test */
    function renders_a_form_with_get_method()
    {
        $this->makeTemplate('<x-form></x-form>')
            ->assertRender('<form method="get"></form>');
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
        $this->makeTemplate('<x-form :method="$method"></x-form>')
            ->with('method', $method)
            ->assertRender('
                <form method="post">
                    '.$this->csrfField().'
                    <input type="hidden" name="_method" value="'.$method.'">
                </form>
            ');
    }

    public function spoofedMethods()
    {
        return [
            ['put'],
            ['patch'],
            ['delete'],
        ];
    }
}
