<?php

namespace Tests;

class FieldNumberTest extends TestCase
{
    /** @test */
    function renders_an_optional_number_field()
    {
        $this->makeTemplate('
            <x-field-number name="name"></x-field-number>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name">
                    Name
                    <span class="badge badge-info">optional</span>
                </label>
                <input name="name" type="number" class="form-control" id="name">
            </div>
        ');
    }
}
