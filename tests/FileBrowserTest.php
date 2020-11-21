<?php

namespace Tests;

class FileBrowserTest extends TestCase
{
    /** @test */
    function renders_an_optional_file_browser_field()
    {
        $this->template('
            <x-field-file-browser name="name"></x-field-file-browser>
        ')->assertRender('
            <div class="form-group optional">
                <label for="name"> Name <span class="badge badge-info">optional</span> </label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="name">
                  <label class="custom-file-label" for="name"> Name </label>
                </div>
            </div>
        ');
    }
}
