<?php

namespace Tests\Fields\Inputs;

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
    function render_input_type_text()
    {
        $this->template('<x-input type="text" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="text" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_input_type_color()
    {
        $this->template('<x-input type="color" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="color" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_input_type_date()
    {
        $this->template('<x-input type="date" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="date" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_input_type_month()
    {
        $this->template('<x-input type="month" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="month" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_input_type_week()
    {
        $this->template('<x-input type="week" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="week" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_input_type_time()
    {
        $this->template('<x-input type="time" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="time" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }

    /** @test */
    function render_input_type_datetime_local()
    {
        $this->template('<x-input type="datetime-local" name="name"/>')
            ->assertRender('
                <div id="field-group-name" class="form-group">
                    <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                    <input type="datetime-local" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }
}
