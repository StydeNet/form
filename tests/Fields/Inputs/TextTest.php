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
                    <label for="field-name">Name</label>
                    <input type="text" id="field-name" name="name" value="" class="form-control">
                </div>
            ');
    }
}
