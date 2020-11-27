<?php

namespace Tests\Fields\Selectables;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class SelectMultipleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function renders_a_optional_select_field()
    {
        $this->template('<x-select-multiple name="brands[]" :options="$options"></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Brands <span class="badge badge-danger">Optional</span> </label>
                    <select id="field-brands" name="brands[]" class="custom-select" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_select_with_custom_label()
    {
        $this->template('<x-select-multiple name="brands[]" :options="$options" label="Car brands"></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Car brands <span class="badge badge-danger">Optional</span> </label>
                    <select id="field-brands" name="brands[]" class="custom-select" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_select_with_custom_id()
    {
        $this->template('<x-select-multiple id="cars-id" name="brands[]" :options="$options"></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="cars-id"> Brands <span class="badge badge-danger">Optional</span> </label>
                    <select id="cars-id" name="brands[]" class="custom-select" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_select_with_help_text()
    {
        $this->template('<x-select-multiple name="brands[]" :options="$options" help="This is the help text."></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Brands <span class="badge badge-danger">Optional</span> </label>
                    <select id="field-brands" name="brands[]" class="custom-select" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                    <small class="form-text text-muted">This is the help text.</small></div>
            ');
    }

    /** @test */
    function renders_an_required_select_field()
    {
        $this->template('<x-select-multiple name="brands[]" :options="$options" required></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Brands </label>
                    <select id="field-brands" name="brands[]" class="custom-select" required="required" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_select_field_with_highlights()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->template('<x-select-multiple name="brands[]" :options="$options" required></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Brands <span class="badge badge-danger">Required</span> </label>
                    <select id="field-brands" name="brands[]" class="custom-select" required="required" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                </div>
            ');
    }

    /** @test */
    function render_a_select_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['brands' => 'Invalid values']))
        );

        $this->template('<x-select-multiple name="brands[]" :options="$options"></x-select-multiple>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Brands <span class="badge badge-danger">Optional</span> </label>
                    <select id="field-brands" name="brands[]" class="custom-select is-invalid" multiple>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                    <div class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }

    /** @test */
    function render_a_select_field_with_empty_slot()
    {
        $this->template('
                <x-select-multiple name="brands[]" :options="$options">
                    <x-slot name="empty">
                        <option>Select a brand</option>
                    </x-slot>
                </x-select-multiple>
            ')->withData('options', [
            'toyota' => 'Toyota',
            'suzuki' => 'Suzuki',
            'mazda' => 'Mazda'
        ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands"> Brands <span class="badge badge-danger">Optional</span> </label>
                    <select id="field-brands" name="brands[]" class="custom-select" multiple>
                        <option>Select a brand</option>
                        <option value="toyota">Toyota</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                    </select>
                </div>
            ');
    }
}
