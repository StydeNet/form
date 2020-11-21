<?php

namespace Tests;

class SwitchTest extends TestCase
{
    /** @test */
    function renders_optional_switches()
    {
        $this->template('
            <x-field-switch name="colors" :options="$options"></x-field-switch>
        ')
            ->withData('options', [
                'orange' => 'Orange',
                'blue' => 'Blue'
            ])
            ->assertRender('
            <div class="form-group optional">
                <label for="colors"> Colors </label>
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="colors[]" class="custom-control-input" id="switch-orange">
                  <label class="custom-control-label" for="switch-orange">Orange</label>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="colors[]" class="custom-control-input" id="switch-blue">
                  <label class="custom-control-label" for="switch-blue">Blue</label>
                </div>
            </div>
        ');
    }
}
