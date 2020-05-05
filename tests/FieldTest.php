<?php

namespace Tests;

class FieldTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        config([
            'form.highlights_requirement' => 'none',
        ]);
    }

    /** @test */
    function renders_an_optional_field()
    {
        $this->makeTemplate('<x-field name="name" />')
            ->assertRender('
              <div class="form-group optional">
                <label for="name"> Name </label>
                <input name="name" type="text" class="form-control" id="name">
              </div>
            ');
    }

    /** @test */
    function renders_a_required_field()
    {
        $this->makeTemplate('<x-field name="email" type="email" required />')
            ->assertRender('
              <div class="form-group required">
                <label for="email"> Email </label>
                <input name="email" type="email" required="required" class="form-control" id="email">
              </div>
            ');
    }

    /** @test */
    function highlights_a_field_as_required()
    {
        config(['form.highlights_requirement' => 'required']);

        $this->makeTemplate('<x-field name="email" type="email" required />')
            ->assertRender('
              <div class="form-group required">
                <label for="email">
                    Email
                    <span class="badge badge-danger">required</span>
                </label>
                <input name="email" type="email" required="required" class="form-control" id="email">
              </div>
            ');
    }

    /** @test */
    function highlights_a_field_as_optional()
    {
        config(['form.highlights_requirement' => 'optional']);

        $this->makeTemplate('<x-field name="email" type="email" />')
            ->assertRender('
              <div class="form-group optional">
                <label for="email">
                    Email
                    <span class="badge badge-info">optional</span>
                </label>
                <input name="email" type="email" class="form-control" id="email">
              </div>
            ');
    }
}
