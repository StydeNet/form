<?php

namespace Styde\Form;

use Illuminate\Support\ServiceProvider;
use Styde\Form\Support\CurrentModel;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'styde-form');

        /*
         * Optional methods to load your package assets
         */
        if ($this->app->runningInConsole()) {
            // Publishing config.
            $this->publishes([
                __DIR__ . '/../config/form.php' => config_path('form.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/styde-form'),
            ], 'views');
        }

        $this->app['blade.compiler']->components(config('components'));
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
