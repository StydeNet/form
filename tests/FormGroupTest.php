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
}
