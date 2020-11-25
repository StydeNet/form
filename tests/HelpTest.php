<?php

namespace Tests;

class HelpTest extends TestCase
{
    /** @test */
    function check_that_it_renders_correctly()
    {
        $this->template('<x-help>This is a help text.</x-help>')
            ->assertRender('<small class="form-text text-muted">This is a help text.</small>');
    }
}
