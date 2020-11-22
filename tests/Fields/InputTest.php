<?php

namespace Tests\Fields;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class InputTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function render_a_basic_input_text()
    {
        $this->makeTemplate('<x-input type="text" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name </label>
                    <input type="text" id="field-name" name="name" class="form-control" value="">
                </div>
            ');
    }

    /** @test */
    function renders_an_required_input_text_with_highlights()
    {
        $this->makeTemplate('<x-input type="text" name="name" required/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name <span class="badge badge-danger">Required</span> </label>
                    <input type="text" id="field-name" name="name" class="form-control" value="" required>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_input_text_without_highlights()
    {
        $this->app['config']->set(['form.highlights.required.activated' => false]);

        $this->makeTemplate('<x-input type="text" name="name" required/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name </label>
                    <input type="text" id="field-name" name="name" class="form-control" value="" required>
                </div>
            ');
    }

    /** @test */
    function renders_an_optional_input_text_with_highlights()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);

        $this->makeTemplate('<x-input type="text" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name <span class="badge badge-info">Optional</span> </label>
                    <input type="text" id="field-name" name="name" class="form-control" value="">
                </div>
            ');
    }

    /** @test */
    function renders_an_required_input_with_highlights_in_spanish()
    {
        $this->app['translator']->setLocale('es');

        $this->makeTemplate('<x-input type="email" name="email" required/>')
            ->assertContain('<span class="badge badge-danger">Obligatorio</span>');
    }

    /** @test */
    function renders_an_optional_input_with_highlights_in_spanish()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);
        $this->app['translator']->setLocale('es');

        $this->makeTemplate('<x-input name="email" type="email"/>')
            ->assertContain('<span class="badge badge-info">Opcional</span>');
    }

    /** @test */
    public function renders_a_input_field_with_a_custom_id()
    {
        $this->makeTemplate('<x-input type="text" name="name" id="username"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="username" > Name </label>
                    <input type="text" id="username" name="name" class="form-control" value="">
                </div>
            ');
    }

    /** @test */
    function render_a_basic_input_text_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['name' => 'Invalid values']))
        );

        $this->makeTemplate('<x-input type="text" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" class="text-danger" > Name </label>
                    <input type="text" id="field-name" name="name" class="form-control is-invalid" value="">
                    <div id="name-feedback" class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }
}
