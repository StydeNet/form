<?php

namespace Tests;

class RadioTest extends TestCase
{
    /** @test */
    function renders_an_optional_radio()
    {
        $this->template('
            <x-field-radio name="color" :options="$options"></x-field-radio>
        ')
            ->withData('options', [
                'orange' => 'Orange',
                'blue' => 'Blue'
            ])
            ->assertRender('
            <div class="custom-control custom-radio">
              <input type="radio" name="color" class="custom-control-input">
              <label class="custom-control-label" for="orange">Orange</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" name="color" class="custom-control-input">
              <label class="custom-control-label" for="blue">Blue</label>
            </div>
        ');
    }
}
