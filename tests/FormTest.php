<?php

namespace Tests;

class FormTest extends TestCase
{
    /** @test */
    function renders_a_form_with_get_method()
    {
        $this->makeTemplate('<x-form></x-form>')
            ->assertRender('<form method="get" ></form>');
    }

    /** @test */
    function renders_a_form_with_post_method()
    {
        $this->makeTemplate('<x-form method="post"></x-form>')
            ->assertRender(sprintf('<form method="post" >%s</form>', csrf_field()));
    }

    /** @test */
    function renders_a_form_with_fields()
    {
        $this->makeTemplate('<x-form><input></x-form>')
            ->assertRender('<form method="get" ><input></form>');
    }

    /**
     * @test
     * @dataProvider spoofedMethods
     */
    function renders_a_form_with_spoofed_method($method)
    {
        $this->makeTemplate('<x-form :method="$method"></x-form>')
            ->withData('method', $method)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="' . $method . '">
                </form>
            ');
    }

    /**
     * Fake http methods
     *
     * @return string[][]
     */
    public function spoofedMethods()
    {
        return [
            ['put'],
            ['patch'],
            ['delete'],
        ];
    }
}
