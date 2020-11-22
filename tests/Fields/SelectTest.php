<?php

namespace Tests\Fields;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class SelectTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function renders_a_optional_select_field()
    {
        $this->template('<x-select name="brands" :options="$options"></x-select>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands </label>
                    <select id="field-brands" name="brands" class="custom-select">
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
        $this->template('<x-select name="brands" empty="Seleccione"></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands </label>
                    <select id="field-brands" name="brands" class="custom-select">
                        <option>Seleccione</option>
                    </select>
                </div>
            ');
    }

    /** @test */
    function renders_a_multiple_select_field()
    {
        $this->template('<x-select name="brands[]" :options="$options" multiple></x-select>')
            ->withData('options', [
                'toyota' => 'Toyota',
                'suzuki' => 'Suzuki',
                'mazda' => 'Mazda'
            ])
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands </label>
                    <select id="field-brands" name="brands[]" class="custom-select" multiple>
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
        $this->template('<x-select name="brands" required></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands <span class="badge badge-danger">Required</span> </label>
                    <select id="field-brands" name="brands" class="custom-select" required></select>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_select_field_without_highlights()
    {
        $this->app['config']->set(['form.highlights.required.activated' => false]);

        $this->template('<x-select name="brands" required></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands </label>
                    <select id="field-brands" name="brands" class="custom-select" required></select>
                </div>
            ');
    }

    /** @test */
    function renders_an_optional_select_field_with_highlights()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);

        $this->template('<x-select name="brands"></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands <span class="badge badge-info">Optional</span> </label>
                    <select id="field-brands" name="brands" class="custom-select"></select>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_select_field_with_highlights_in_spanish()
    {
        $this->app['translator']->setLocale('es');

        $this->template('<x-select name="brands" required></x-select>')
            ->assertContains('<span class="badge badge-danger">Obligatorio</span>');
    }

    /** @test */
    function renders_an_optional_select_field_with_highlights_in_spanish()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);
        $this->app['translator']->setLocale('es');

        $this->template('<x-select name="brands"></x-select>')
            ->assertContains('<span class="badge badge-info">Opcional</span>');
    }

    /** @test */
    public function renders_a_select_field_with_a_custom_label()
    {
        $this->template('<x-select name="brands" label="My Label"></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > My Label </label>
                    <select id="field-brands" name="brands" class="custom-select"></select>
                </div>
            ');
    }

    /** @test */
    public function renders_a_select_field_with_an_help_text()
    {
        $this->template('<x-select name="brands" help="This is the help text."></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" > Brands </label>
                    <select id="field-brands" name="brands" class="custom-select"></select>
                    <small id="brands-help" class="form-text text-muted">This is the help text.</small>
                </div>
            ');
    }

    /** @test */
    public function renders_a_select_field_with_a_custom_id()
    {
        $this->template('<x-select id="brands-id-form" name="brands"></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="brands-id-form" > Brands </label>
                    <select id="brands-id-form" name="brands" class="custom-select"></select>
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

        $this->template('<x-select name="brands"></x-select>')
            ->assertRender('
                <div id="field-group-brands" class="form-group">
                    <label for="field-brands" class="text-danger" > Brands </label>
                    <select id="field-brands" name="brands" class="custom-select is-invalid"></select>
                    <div id="brands-feedback" class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }
}
