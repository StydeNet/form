<?php

namespace Tests\Fields;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class RadioTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function renders_a_optional_single_radio_field()
    {
        $this->template('<x-radio name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_multiple_radio_field()
    {
        $this->template('<x-radio name="gender" :options="$options"/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input" value="m" >
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input" value="f" >
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_single_radio_field_inline()
    {
        $this->template('<x-radio class="custom-control-inline" name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_multiple_radio_field_inline()
    {
        $this->template('<x-radio class="custom-control-inline" name="gender" :options="$options"/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input" value="m" >
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input" value="f" >
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_with_custom_label()
    {
        $this->template('<x-radio name="gender" option="male" label="Man"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" >
                    <label class="custom-control-label" for="field-gender-male">Man</label>
                </div>
            ');
    }

    /** @test */
    function render_a_single_radio_field_keeping_the_default_id()
    {
        $this->template('<x-radio id="field-custom-id" name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_with_checked()
    {
        $this->template('<x-radio name="gender" option="male" checked/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" checked="checked">
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_single_radio_with_help_text()
    {
        $this->template('<x-radio name="gender" option="male" help="This is the help text."/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                    <small id="gender-help" class="form-text text-muted">This is the help text.</small>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_multiple_radio_with_help_text()
    {
        $this->template('<x-radio class="custom-control-inline" name="gender" help="This is the help text." :options="$options"/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input" value="m" >
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                        <small id="gender-help" class="form-text text-muted">This is the help text.</small>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input" value="f" >
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                        <small id="gender-help" class="form-text text-muted">This is the help text.</small>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_single_radio_field()
    {
        $this->template('<x-radio name="gender" option="male" required/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input" value="male" required>
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_multiple_radio_field()
    {
        $this->template('<x-radio class="custom-control-inline" name="gender" :options="$options" required/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender <span class="badge badge-danger">Required</span> </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input" value="m" required>
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input" value="f" required>
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_optional_multiple_radio_field_with_highlights()
    {
        $this->app['config']->set(['form.highlights.optional.activated' => true]);

        $this->template('<x-radio class="custom-control-inline" name="gender" :options="$options"/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender <span class="badge badge-info">Optional</span> </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input" value="m" >
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input" value="f" >
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_multiple_radio_field_withou_highlights()
    {
        $this->app['config']->set(['form.highlights.required.activated' => false]);

        $this->template('<x-radio class="custom-control-inline" name="gender" :options="$options" required/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input" value="m" required>
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input" value="f" required>
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function render_a_single_radio_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['gender' => 'Invalid values']))
        );

        $this->template('<x-radio name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" class="custom-control-input is-invalid" value="male" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                    <div id="gender-feedback" class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }

    /** @test */
    function render_a_multiple_radio_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['gender' => 'Invalid values']))
        );

        $this->template('<x-radio class="custom-control-inline" name="gender" :options="$options"/>')
            ->withData('options', [
                'm' => 'Male',
                'f' => 'Female',
            ])
            ->assertRender('
                <div id="field-group-gender" class="form-group">
                    <label> Gender </label>
                    <br>
                    <div id="field-group-gender-m" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-m" name="gender" class="custom-control-input is-invalid" value="m" >
                        <label class="custom-control-label" for="field-gender-m">Male</label>
                        <div id="gender-feedback" class="invalid-feedback">Invalid values</div>
                    </div>
                    <div id="field-group-gender-f" class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="field-gender-f" name="gender" class="custom-control-input is-invalid" value="f" >
                        <label class="custom-control-label" for="field-gender-f">Female</label>
                        <div id="gender-feedback" class="invalid-feedback">Invalid values</div>
                    </div>
                </div>
            ');
    }
}
