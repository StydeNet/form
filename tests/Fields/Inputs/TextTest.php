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
}
