<?php

namespace Tests\Fields\Selectables;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class CheckboxMultipleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function renders_a_optional_checkbox_field()
    {
        $this->template('<x-checkbox-multiple name="is_admin" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_field_inline()
    {
        $this->template('<x-checkbox-multiple class="custom-control-inline" name="is_admin" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_with_custom_label()
    {
        $this->template('<x-checkbox-multiple name="is_admin" label="Is Administrator" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is Administrator <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_with_custom_id()
    {
        $this->template('<x-checkbox-multiple id="custom-id" name="is_admin" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="custom-id-js" name="is_admin" value="js" class="custom-control-input" >
                        <label class="custom-control-label" for="custom-id-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="custom-id-php" name="is_admin" value="php" class="custom-control-input" >
                        <label class="custom-control-label" for="custom-id-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="custom-id-c#" name="is_admin" value="c#" class="custom-control-input" >
                        <label class="custom-control-label" for="custom-id-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_with_checked()
    {
        $this->template('<x-checkbox-multiple name="is_admin" checked :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" checked="checked">
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" checked="checked">
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" checked="checked">
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_a_optional_checkbox_with_help_text()
    {
        $this->template('<x-checkbox-multiple name="is_admin" help="This is the help text." :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                        <small class="form-text text-muted">This is the help text.</small>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                        <small class="form-text text-muted">This is the help text.</small>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" >
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                        <small class="form-text text-muted">This is the help text.</small>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_checkbox_field()
    {
        $this->template('<x-checkbox-multiple name="is_admin" required :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" required="required">
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" required="required">
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" required="required">
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function renders_an_required_checkbox_field_with_highlight()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->template('<x-checkbox-multiple name="is_admin" required :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Is admin <span class="badge badge-danger">Required</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input" required="required">
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input" required="required">
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input" required="required">
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                    </div>
                </div>
            ');
    }

    /** @test */
    function render_a_checkbox_field_with_errors()
    {
        $this->app['view']->share('errors',
            (new ViewErrorBag())
                ->put('default', new MessageBag(['is_admin' => 'Invalid values']))
        );

        $this->template('<x-checkbox-multiple name="is_admin" label="Administrator?" :options="$options"/>')
            ->withData('options', [
                'js' => 'Javascript',
                'php' => 'PHP',
                'c#' => 'CSharp'
            ])
            ->assertRender('
                <div id="field-group-is_admin" class="form-group">
                    <label > Administrator? <span class="badge badge-danger">Optional</span> </label>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-js" name="is_admin" value="js" class="custom-control-input is-invalid" >
                        <label class="custom-control-label" for="field-is_admin-js">Javascript</label>
                        <div class="invalid-feedback">Invalid values</div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-php" name="is_admin" value="php" class="custom-control-input is-invalid" >
                        <label class="custom-control-label" for="field-is_admin-php">PHP</label>
                        <div class="invalid-feedback">Invalid values</div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin-c#" name="is_admin" value="c#" class="custom-control-input is-invalid" >
                        <label class="custom-control-label" for="field-is_admin-c#">CSharp</label>
                        <div class="invalid-feedback">Invalid values</div>
                    </div>
                </div>
            ');
    }
}
