<?php

namespace Tests;

class FormTest extends TestCase
{
    /** @test */
    function renders_a_form()
    {
        $this->assertTemplate('
            <x-form></x-form>
        ')->renders('
            <form method="get"> </form>
        ');
    }

    /** @test */
    function renders_a_form_with_post_method()
    {
        $this->assertTemplate('
            <x-form method="post"></x-form>
        ')->renders('
            <form method="post"> </form>
        ');
    }

    /** @test */
    function renders_a_form_with_put_method()
    {
        $this->assertTemplate('
            <x-form method="put"></x-form>
        ')->renders('
            <form method="post">
                <input type="hidden" name="_method" value="put">
            </form>
        ');
    }

    protected function assertTemplate(string $template)
    {
        return new AssertTemplate($this->app->make('view'), $template);
    }
}
