<?php

namespace Tests;

class LabelTest extends TestCase
{
    /** @test */
    function render_a_simple_label()
    {
        $this->template('<x-label>Name</x-label>')
            ->assertRender('<label >Name</label>');
    }

    /** @test */
    function render_a_label_with_id_attribute()
    {
        $this->template('<x-label :id="$id">Name</x-label>')
            ->withData('id', 'field-name')
            ->assertRender('<label id="field-name">Name</label>');
    }
}
