<?php

namespace Tests;

class RangeTest extends TestCase
{
    /** @test */
    function renders_an_optional_range_field()
    {
        $this->makeTemplate('
            <x-field-range name="quantity" min="0" max="5"></x-field-range>
        ')->assertRender('
            <div class="form-group optional">
                <label for="quantity"> Quantity <span class="badge badge-info">optional</span> </label>
                <input name="quantity" type="range" class="custom-range" min="0" max="5" id="quantity">
            </div>
        ');
    }
}
