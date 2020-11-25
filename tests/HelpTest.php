<?php

namespace Tests;

class HelpTest extends TestCase
{
    /** @test */
    function renders_a_form_with_get_method()
    {
        $this->template('<x-help name="name">This is a help text.</x-help>')
            ->assertRender('<small id="name-help" class="form-text text-muted">This is a help text.</small>');
    }
}
