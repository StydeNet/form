<?php

namespace Tests\Fields\Inputs;

use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class TextTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function render_field()
    {
        $this->template('<x-input-text name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="text" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_field_without_highlight()
    {
        $this->app['config']->set(['form.highlights_requirement' => null]);

        $this->template('<x-input-text name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name </label>
                    <input type="text" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_field_with_required_highlight()
    {
        $this->markTestIncomplete();

        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->template('<x-input-text name="name" required/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Required</span> </label>
                    <input type="text" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }
}
