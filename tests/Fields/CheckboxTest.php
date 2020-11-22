<?php

namespace Tests\Fields;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class CheckboxTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function renders_a_optional_single_checkbox_field()
    {
        $this->makeTemplate('<x-checkbox name="is_admin"/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input" value="on" >
                    <label class="custom-control-label" for="field-is_admin-on">On</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_multiple_checkbox_field()
    {
        $this->makeTemplate('<x-checkbox name="poo" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_single_checkbox_field_inline()
    {
        $this->makeTemplate('<x-checkbox class="custom-control-inline" name="is_admin" option="true"/>')
            ->assertRender('
                <div id="field-group-is_admin-true" class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="field-is_admin-true" name="is_admin" class="custom-control-input" value="true" >
                    <label class="custom-control-label" for="field-is_admin-true">True</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_multiple_checkbox_field_inline()
    {
        $this->makeTemplate('<x-checkbox class="custom-control-inline" name="poo" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_with_custom_label()
    {
        $this->makeTemplate('<x-checkbox name="is_admin" option="on" label="Is Administrator"/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input" value="on" >
                    <label class="custom-control-label" for="field-is_admin-on">Is Administrator</label>
                </div>
            ');
    }

    /** @test */
    function render_a_single_checkbox_field_keeping_the_default_id()
    {
        $this->makeTemplate('<x-checkbox id="field-custom-id" name="is_admin"/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input" value="on" >
                    <label class="custom-control-label" for="field-is_admin-on">On</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_with_checked()
    {
        $this->makeTemplate('<x-checkbox name="is_admin" checked/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input" value="on" checked="checked">
                    <label class="custom-control-label" for="field-is_admin-on">On</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_single_checkbox_with_help_text()
    {
        $this->makeTemplate('<x-checkbox name="is_admin" help="This is the help text."/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input" value="on" >
                    <label class="custom-control-label" for="field-is_admin-on">On</label>
                    <small id="is_admin-help" class="form-text text-muted">This is the help text.</small>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_multiple_checkbox_with_help_text()
    {
        $this->makeTemplate('<x-checkbox name="poo" help="This is the help text." :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                         <small id="poo-help" class="form-text text-muted">This is the help text.</small>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                         <small id="poo-help" class="form-text text-muted">This is the help text.</small>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_single_checkbox_field()
    {
        $this->makeTemplate('<x-checkbox name="is_admin" required/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input" value="on" required>
                    <label class="custom-control-label" for="field-is_admin-on">On</label>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_multiple_checkbox_field_only_badge()
    {
        $this->makeTemplate('<x-checkbox name="poo" :options="$options" required/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo <span class="badge badge-danger">Required</span> </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_optional_multiple_checkbox_field_with_highlights()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);

        $this->makeTemplate('<x-checkbox name="poo" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo <span class="badge badge-info">Optional</span> </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_multiple_checkbox_field_withou_highlights()
    {
        $this->app['config']->set(['form.highlights.required.activated' => false]);

        $this->makeTemplate('<x-checkbox name="poo" :options="$options" required/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function render_a_single_checkbox_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['is_admin' => 'Invalid values']))
        );

        $this->makeTemplate('<x-checkbox name="is_admin" label="Administrator?"/>')
            ->assertRender('
                <div id="field-group-is_admin-on" class="custom-control custom-checkbox">
                    <input type="checkbox" id="field-is_admin-on" name="is_admin" class="custom-control-input is-invalid" value="on" >
                    <label class="custom-control-label" for="field-is_admin-on">Administrator?</label>
                    <div id="is_admin-feedback" class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }

    /** @test */
    function render_a_multiple_checkbox_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['poo' => 'Invalid values']))
        );

        $this->makeTemplate('<x-checkbox name="poo" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'Php',
            ])
            ->assertRender('
                <div id="field-group-poo" class="form-group">
                    <label> Poo </label>
                    <br>
                    <div id="field-group-poo-js" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-js" name="poo" class="custom-control-input is-invalid" value="js" >
                        <label class="custom-control-label" for="field-poo-js">Javascript</label>
                        <div id="poo-feedback" class="invalid-feedback">Invalid values</div>
                    </div>
                    <div id="field-group-poo-php" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-poo-php" name="poo" class="custom-control-input is-invalid" value="php" >
                        <label class="custom-control-label" for="field-poo-php">Php</label>
                        <div id="poo-feedback" class="invalid-feedback">Invalid values</div>
                    </div>
                </div>
            ');
    }
}
