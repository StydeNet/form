<?php

namespace Tests;

class FeedbackTest extends TestCase
{
    /** @test */
    function check_that_it_renders_correctly()
    {
        $this->template('<x-feedback>This is a error text.</x-feedback>')
            ->assertRender('<div class="invalid-feedback">This is a error text.</div>');
    }
}
