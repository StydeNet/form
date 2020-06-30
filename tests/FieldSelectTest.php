<?php

namespace Tests;

class FieldSelectTest extends TestCase
{

    /** @test */
    function renders_a_optional_select_field()
    {
        $this->makeTemplate('
            <x-field-select name="brands" :options="$options"></x-field-select>
        ')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
            <div class="form-group optional">
                <label for="brands"> Brands </label>
                <select class="custom-select" id="brands" name="brands">
                    <option>-</option>
                    <option value="toyota">Toyota</option>
                    <option value="suzuki">Suzuki</option>
                    <option value="mazda">Mazda</option>
                </select>
            </div>
        ');
    }

    /** @test */
    function it_adds_an_empty_option_to_select_fields()
    {
        $this->makeTemplate('
            <x-field-select name="brands" empty="Seleccione"></x-field-select>
        ')->assertRender('
            <div class="form-group optional">
                <label for="brands"> Brands </label>
                <select class="custom-select" id="brands" name="brands">
                    <option>Seleccione</option>
                </select>
            </div>
        ');
    }

    /** @test */
    function renders_a_multiple_select_field()
    {
        $this->makeTemplate('
            <x-field-select name="brands" :options="$options" multiple></x-field-select>
        ')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
            <div class="form-group optional">
                <label for="brands"> Brands </label>
                <select class="custom-select" id="brands" multiple="multiple" name="brands">
                    <option>-</option>
                    <option value="toyota">Toyota</option>
                    <option value="suzuki">Suzuki</option>
                    <option value="mazda">Mazda</option>
                </select>
            </div>
        ');
    }
}
