<?php

namespace Tests;

class HelpTest extends TestCase
{
    /** @test */
    function renders_a_help_component()
    {
        $this->template('<x-help>This is a help text.</x-help>')
            ->assertRender('<small class="form-text text-muted">This is a help text.</small>');
    }

    /** @test */
    function renders_a_help_error_component()
    {
        $this->template('<x-help has-errors="true">This is a error text.</x-help>')
            ->assertRender('<div class="invalid-feedback">This is a error text.</div>');
    }
}
