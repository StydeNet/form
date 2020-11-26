<?php

namespace Tests\Fields\Selectables;

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
    function renders_a_optional_radio_field()
    {
        $this->template('<x-radio name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_field_inline()
    {
        $this->template('<x-radio class="custom-control-inline" name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_with_custom_label()
    {
        $this->template('<x-radio name="gender" option="male" label="Sex"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input" >
                    <label class="custom-control-label" for="field-gender-male">Sex</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_with_custom_id()
    {
        $this->template('<x-radio id="custom-id" name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="custom-id-male" name="gender" value="male" class="custom-control-input" >
                    <label class="custom-control-label" for="custom-id-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_with_checked()
    {
        $this->template('<x-radio name="gender" option="male" checked/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_radio_with_help_text()
    {
        $this->template('<x-radio name="gender" option="male" help="This is the help text."/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                    <small class="form-text text-muted">This is the help text.</small>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_radio_field()
    {
        $this->template('<x-radio name="gender" option="male" required/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input" required="required">
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                </div>
            ');
    }

    /** @test */
    function render_a_radio_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['gender' => 'Invalid values']))
        );

        $this->template('<x-radio name="gender" option="male"/>')
            ->assertRender('
                <div id="field-group-gender-male" class="custom-control custom-radio">
                    <input type="radio" id="field-gender-male" name="gender" value="male" class="custom-control-input is-invalid" >
                    <label class="custom-control-label" for="field-gender-male">Male</label>
                    <div class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }
}
