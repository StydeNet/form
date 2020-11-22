<?php

namespace Tests\Fields;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class TextAreaTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function render_a_basic_textarea_field()
    {
        $this->makeTemplate('<x-textarea name="name"></x-textarea>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name </label>
                    <textarea id="field-name" name="name" class="form-control" rows="3"></textarea>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_textarea_field_with_highlights()
    {
        $this->makeTemplate('<x-textarea name="name" required></x-textarea>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name <span class="badge badge-danger">Required</span> </label>
                    <textarea id="field-name" name="name" class="form-control" rows="3" required></textarea>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_textarea_field_without_highlights()
    {
        $this->app['config']->set(['form.highlights.required.activated' => false]);

        $this->makeTemplate('<x-textarea name="name" required/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name </label>
                    <textarea id="field-name" name="name" class="form-control" rows="3" required></textarea>
                </div>
            ');
    }

    /** @test */
    function renders_an_optional_textarea_field_with_highlights()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);

        $this->makeTemplate('<x-textarea name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name <span class="badge badge-info">Optional</span> </label>
                    <textarea id="field-name" name="name" class="form-control" rows="3"></textarea>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_textarea_field_with_highlights_in_spanish()
    {
        $this->app['translator']->setLocale('es');

        $this->makeTemplate('<x-textarea name="email" required/>')
            ->assertContain('<span class="badge badge-danger">Obligatorio</span>');
    }

    /** @test */
    function renders_an_optional_textarea_field_with_highlights_in_spanish()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);
        $this->app['translator']->setLocale('es');

        $this->makeTemplate('<x-textarea name="email"/>')
            ->assertContain('<span class="badge badge-info">Opcional</span>');
    }

    /** @test */
    public function renders_a_textarea_field_with_a_custom_label()
    {
        $this->makeTemplate('<x-textarea name="name" label="My Label"></x-textarea>')
            ->assertRender('
                 <div id="field-group-name" class="form-group">
                    <label for="field-name" > My Label </label>
                    <textarea id="field-name" name="name" class="form-control" rows="3"></textarea>
                </div>
            ');
    }

    /** @test */
    public function renders_a_textarea_field_with_an_help_text()
    {
        $this->makeTemplate('<x-textarea name="name" help="This is the help text."></x-textarea>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name </label>
                    <textarea id="field-name" name="name" class="form-control" rows="3"></textarea>
                    <small id="name-help" class="form-text text-muted">This is the help text.</small>
                </div>
            ');
    }

    /** @test */
    public function renders_a_textarea_field_with_a_custom_row_size()
    {
        $this->makeTemplate('<x-textarea name="name" rows="6"></x-textarea>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" > Name </label>
                    <textarea id="field-name" name="name" class="form-control" rows="6"></textarea>
                </div>
            ');
    }

    /** @test */
    function render_a_textarea_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['name' => 'Invalid values']))
        );

        $this->makeTemplate('<x-textarea name="name"></x-textarea>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name" class="text-danger" > Name </label>
                    <textarea id="field-name" name="name" class="form-control is-invalid" rows="3"></textarea>
                    <div id="name-feedback" class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }
}
