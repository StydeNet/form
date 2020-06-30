<?php

namespace Tests;

class FieldPasswordTest extends TestCase
{
    /** @test */
    function renders_an_optional_password_field()
    {
        $this->makeTemplate('
            <x-field-password name="name"></x-field-password>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name"> Name <span class="badge badge-info">optional</span> </label>
                <input name="name" type="password" class="form-control" id="name">
            </div>
        ');
    }

    /** @test */
    function renders_a_required_password_field()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->makeTemplate('
            <x-field-password name="name" required></x-field-password>
        ')->assertRender('
            <div class="form-group required">
                <label for="name"> Name <span class="badge badge-danger">required</span> </label>
                <input name="name" type="password" class="form-control" required="required" id="name">
            </div>
        ');
    }
}
