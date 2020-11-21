<?php

namespace Tests;

class SubmitButtonTest extends TestCase
{
    /** @test */
    function renders_a_submit_button()
    {
        $this->template('
            <x-submit/>
        ')->assertRender('
            <button type="submit" class="btn">Submit</button>
        ');
    }
}
