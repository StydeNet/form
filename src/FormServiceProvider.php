<?php

namespace Styde\Form;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/form.php', 'form');
        $this->mergeConfigFrom(__DIR__.'/../config/components.php', 'components');

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'styde-form');

//        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'form');
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');

        $this->app->make('blade.compiler')->components(config('components'));
    }
}
