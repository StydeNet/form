<?php

namespace Tests\Fields\Inputs;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class NumberTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function render_field()
    {
        $this->template('<x-input-number name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="number" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_field_without_highlight()
    {
        $this->app['config']->set(['form.highlights_requirement' => null]);

        $this->template('<x-input-number name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name </label>
                    <input type="number" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_field_with_required_highlight()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->template('<x-input-number name="name" required/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Required</span> </label>
                    <input type="number" id="field-name" name="name" value="" class="form-control" required="required">
                </div>
            ');
    }

    /** @test */
    function renders_an_optional_input_text_with_highlights_in_spanish()
    {
        $this->app['translator']->setLocale('es');

        $this->template('<x-input-number name="email"/>')
            ->assertContains('<span class="badge badge-danger">Opcional</span>');
    }

    /** @test */
    function check_that_help_text_is_displayed()
    {
        $this->template('<x-input-number name="name" help="This is a help text."/>')
            ->assertContains('<small class="form-text text-muted">This is a help text.</small>');
    }

    /** @test */
    function check_that_error_text_is_displayed()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['name' => 'Invalid values']))
        );

        $this->template('<x-input-number name="name"/>')
            ->assertContains('<div class="invalid-feedback">Invalid values</div>');
    }

    /** @test */
    function check_that_error_class_is_displayed()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['name' => 'Invalid values']))
        );

        $this->template('<x-input-number name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="number" id="field-name" name="name" value="" class="form-control is-invalid">
                    <div class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }
}
