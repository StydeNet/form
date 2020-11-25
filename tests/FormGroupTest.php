<?php

namespace Tests;

class FormGroupTest extends TestCase
{
    /** @test */
    function render_a_form_group_wrapper()
    {
        $this->template('<x-form-group name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group"></div>
            ');
    }

    /** @test */
    function render_a_form_group_with_custom_id()
    {
        $this->template('<x-form-group id="group-id" name="name"/>')
            ->assertRender('
                <div id="group-id" class="form-group"></div>
            ');
    }
}
