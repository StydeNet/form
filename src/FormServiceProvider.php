<?php

namespace Styde\Form;

use Illuminate\Support\ServiceProvider;
use Styde\Form\Support\CurrentModel;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'styde-form');

//        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'form');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');

        $this->app->make('blade.compiler')->components(config('components'));
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/form.php', 'form');
        $this->mergeConfigFrom(__DIR__ . '/../config/components.php', 'components');

        // Registering Current Model Instance for Forms
        $this->app->singleton(CurrentModel::class, function ($app) {
            return new CurrentModel;
        });
    }
}
