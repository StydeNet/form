<?php

namespace Tests;

use Styde\Form;

class FormTest extends TestCase
{
    /** @test */
    function renders_a_form()
    {
        $form = new Form;

        $this->assertSame('<form></form>', trim($form->render()->toHtml()));
    }
}
