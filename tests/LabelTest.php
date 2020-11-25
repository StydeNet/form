<?php

namespace Tests;

class LabelTest extends TestCase
{
    /** @test */
    function render_a_simple_label()
    {
        $this->template('<x-label>Name</x-label>')
            ->assertRender('<label>Name</label>');
    }
}
