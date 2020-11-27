<?php

namespace Tests\Fields\Selectables;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class SwitchTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function renders_a_optional_switch_field()
    {
        $this->template('<x-switch name="is_admin"/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" >
                    <label class="custom-control-label" for="field-is_admin">Is admin</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_switch_field_inline()
    {
        $this->template('<x-switch class="custom-control-inline" name="is_admin"/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch custom-control-inline">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" >
                    <label class="custom-control-label" for="field-is_admin">Is admin</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_switch_with_custom_label()
    {
        $this->template('<x-switch name="is_admin" label="Is Administrator"/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" >
                    <label class="custom-control-label" for="field-is_admin">Is Administrator</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_switch_with_custom_id()
    {
        $this->template('<x-switch id="custom-id" name="is_admin"/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="custom-id" name="is_admin" value="true" class="custom-control-input" >
                    <label class="custom-control-label" for="custom-id">Is admin</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_switch_with_custom_option()
    {
        $this->template('<x-switch name="is_admin" option="yes"/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="yes" class="custom-control-input" >
                    <label class="custom-control-label" for="field-is_admin">Is admin</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_switch_with_checked()
    {
        $this->template('<x-switch name="is_admin" checked/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" checked="checked">
                    <label class="custom-control-label" for="field-is_admin">Is admin</label>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_switch_with_help_text()
    {
        $this->template('<x-switch name="is_admin" help="This is the help text."/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" >
                    <label class="custom-control-label" for="field-is_admin">Is admin</label>
                    <small class="form-text text-muted">This is the help text.</small>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_switch_field()
    {
        $this->template('<x-switch name="is_admin" required/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" required="required">
                    <label class="custom-control-label" for="field-is_admin">Is admin</label>
                </div>
            ');
    }

    /** @test */
    function render_a_switch_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['is_admin' => 'Invalid values']))
        );

        $this->template('<x-switch name="is_admin" label="Administrator?"/>')
            ->assertRender('
                <div id="field-group-is_admin" class="custom-control custom-switch">
                    <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input is-invalid" >
                    <label class="custom-control-label" for="field-is_admin">Administrator?</label>
                    <div class="invalid-feedback">Invalid values</div>
                </div>
            ');
    }
}
