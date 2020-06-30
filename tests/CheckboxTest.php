<?php

namespace Tests;

class CheckboxTest extends TestCase
{
    /** @test */
    function renders_an_optional_checkbox()
    {
        $this->makeTemplate('
            <x-field-checkbox name="tags" :options="$options"></x-field-checkbox>
        ')
            ->withData('options', [
                'orange' => 'Orange',
                'blue' => 'Blue'
            ])
            ->assertRender('
            <div id="field-tags" class="form-group optional">
                <label for="tags">
                    Tags
                    <span class="badge badge-info">optional</span>
                </label>
                <div id="tags-orange" class="form-check">
                    <input type="checkbox" name="tags[]" value="orange" class="form-check-input">
                    <label class="form-check-label" for="orange">
                        Orange
                    </label>
                </div>
                <div id="tags-blue" class="form-check">
                    <input type="checkbox" name="tags[]" value="blue" class="form-check-input">
                    <label class="form-check-label" for="blue">
                        Blue
                    </label>
                </div>
            </div>
        ');
    }

    /** @test */
    function renders_a_required_checkbox()
    {
        $this->app['config']->set(['form.highlights_requirement' => 'required']);

        $this->makeTemplate('
            <x-field-checkbox name="tags" :options="$options" required></x-field-checkbox>
        ')
            ->withData('options', [
                'orange' => 'Orange',
                'blue' => 'Blue'
            ])
            ->assertRender('
            <div id="field-tags" class="form-group required">
                <label for="tags">
                    Tags
                    <span class="badge badge-danger">required</span>
                </label>
                <div id="tags-orange" class="form-check">
                    <input type="checkbox" name="tags[]" value="orange" class="form-check-input">
                    <label class="form-check-label" for="orange">
                        Orange
                    </label>
                </div>
                <div id="tags-blue" class="form-check">
                    <input type="checkbox" name="tags[]" value="blue" class="form-check-input">
                    <label class="form-check-label" for="blue">
                        Blue
                    </label>
                </div>
            </div>
        ');
    }

    /** @test */
    function renders_a_checkbox_with_help_text()
    {
        $this->makeTemplate('
            <x-field-checkbox name="tags" :options="$options" help="This is the help text."></x-field-checkbox>
        ')
            ->withData('options', [
                'orange' => 'Orange',
                'blue' => 'Blue'
            ])
            ->assertRender('
            <div id="field-tags" class="form-group optional">
                <label for="tags">
                    Tags
                    <span class="badge badge-info">optional</span>
                </label>
                <div id="tags-orange" class="form-check">
                    <input type="checkbox" name="tags[]" value="orange" class="form-check-input">
                    <label class="form-check-label" for="orange">
                        Orange
                    </label>
                </div>
                <div id="tags-blue" class="form-check">
                    <input type="checkbox" name="tags[]" value="blue" class="form-check-input">
                    <label class="form-check-label" for="blue">
                        Blue
                    </label>
                </div>
                <small id="help_block_tags" class="form-text text-muted">This is the help text.</small>
            </div>
        ');
    }
}
