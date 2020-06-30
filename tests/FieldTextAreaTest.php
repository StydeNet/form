<?php

namespace Tests;

class FieldTextAreaTest extends TestCase
{
    /** @test */
    function renders_an_optional_textarea_field()
    {
        $this->makeTemplate('
            <x-field-textarea name="name"></x-field-textarea>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name"> Name </label>
                <textarea class="form-control" name="name" rows="3"></textarea>
            </div>
        ');
    }

    /** @test */
    function renders_a_required_textarea_field()
    {
        $this->makeTemplate('
            <x-field-textarea name="name" required></x-field-textarea>
        ')->assertRender('
            <div class="form-group required">
                <label for="name"> Name </label>
                <textarea class="form-control" required="required" name="name" rows="3"></textarea>
            </div>
        ');
    }

    /** @test */
    public function renders_a_textarea_field_with_a_custom_label()
    {
        $this->makeTemplate('
            <x-field-textarea name="name" label="My Label"></x-field-textarea>
        ')->assertRender('
             <div class="form-group optional">
                <label for="name"> My Label </label>
                <textarea class="form-control" name="name" rows="3"></textarea>
            </div>
        ');
    }

    /** @test */
    public function renders_a_textarea_field_with_an_help_text()
    {
        $this->makeTemplate('
            <x-field-textarea name="name" help="This is the help text."></x-field-textarea>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name"> Name </label>
                <textarea class="form-control" name="name" rows="3"></textarea>
                <small id="nameHelp" class="form-text text-muted"> This is the help text. </small>
            </div>
        ');
    }

    /** @test */
    public function renders_a_textarea_field_with_a_custom_id()
    {
        $this->makeTemplate('
            <x-field-textarea name="name" id="username"></x-field-textarea>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name"> Name </label>
                <textarea class="form-control" id="username" name="name" rows="3"></textarea>
            </div>
        ');
    }

    /** @test */
    public function renders_a_textarea_field_with_a_custom_row_size()
    {
        $this->makeTemplate('
            <x-field-textarea name="name" rows="6"></x-field-textarea>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name"> Name </label>
                <textarea class="form-control" name="name" rows="6"></textarea>
            </div>
        ');
    }
}
