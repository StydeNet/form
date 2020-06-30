<?php

namespace Tests;

class FileTest extends TestCase
{
    /** @test */
    function renders_an_optional_file_field()
    {
        $this->makeTemplate('
            <x-field-file name="name"></x-field-file>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name">
                    Name
                    <span class="badge badge-info">optional</span> 
                </label>
                <input name="name" type="file" class="form-control-file"  id="name">
            </div>
        ');
    }

    /** @test */
    function renders_a_required_file_field()
    {
        $this->makeTemplate('
            <x-field-file name="name" required></x-field-file>
        ')->assertRender('
            <div class="form-group required">
                <label for="name">
                    Name
                </label>
                <input name="name" type="file" class="form-control-file" required="required" id="name">
            </div>
        ');
    }

    /** @test */
    public function renders_a_file_field_with_a_custom_label()
    {
        $this->makeTemplate('
            <x-field-file name="name" label="My Label"></x-field-file>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name">
                    My Label
                    <span class="badge badge-info">optional</span>
                </label>
                <input name="name" type="file" class="form-control-file" id="name">
            </div>
        ');
    }

    /** @test */
    public function renders_a_file_field_with_an_help_text()
    {
        $this->makeTemplate('
            <x-field-file name="name" help="This is the help text."></x-field-file>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name">
                    Name
                    <span class="badge badge-info">optional</span>
                </label>
                <input name="name" type="file" class="form-control-file" id="name">
                <small id="nameHelp" class="form-text text-muted">This is the help text.</small>
            </div>
        ');
    }
}
