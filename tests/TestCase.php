<?php

namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders()
    {
        return [
            'Styde\FormServiceProvider'
        ];
    }
}
