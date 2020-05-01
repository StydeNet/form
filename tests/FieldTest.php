<?php

namespace Tests;

class FieldTest extends TestCase
{
    /** @test */
    function renders_a_field()
    {
        $this->makeTemplate('<x-field name="name" />')
            ->assertRender('
              <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name">
              </div>
            ');

        $this->makeTemplate('<x-field name="email" type="email" />')
            ->assertRender('
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email">
              </div>
            ');
    }
}
