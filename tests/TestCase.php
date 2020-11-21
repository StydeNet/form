<?php

namespace Tests;

use Styde\Whetstone\InteractsWithBlade;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use InteractsWithBlade;

    public function getPackageProviders($app)
    {
        return [
            'Styde\Form\FormServiceProvider',
            'Styde\Whetstone\WhetstoneServiceProvider',
        ];
    }
}
