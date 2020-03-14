<?php

namespace Styde;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component(Form::class, 'form');

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'styde-form');
    }
}
