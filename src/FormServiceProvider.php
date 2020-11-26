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
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'styde-form');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'styde-form');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');

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

        $this->app['blade.compiler']->components($this->components());
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/form.php', 'form');

        // Registering Current Model Instance for Forms
        $this->app->singleton(CurrentModel::class, function ($app) {
            return new CurrentModel;
        });
    }

    /**
     * Blade components
     *
     * @return string[]
     */
    private function components()
    {
        return [
            \Styde\Form\View\Components\Form::class => 'form',
            \Styde\Form\View\Components\FormGroup::class => 'form-group',
            \Styde\Form\View\Components\Label::class => 'label',
            \Styde\Form\View\Components\Help::class => 'help',
            \Styde\Form\View\Components\Feedback::class => 'feedback',
            \Styde\Form\View\Components\Fields\Inputs\Text::class => 'input-text',
            \Styde\Form\View\Components\Fields\Inputs\Number::class => 'input-number',
            \Styde\Form\View\Components\Fields\Inputs\Password::class => 'input-password',
            \Styde\Form\View\Components\Fields\Inputs\Email::class => 'input-email',
            \Styde\Form\View\Components\Fields\Inputs\Url::class => 'input-url',
            \Styde\Form\View\Components\Fields\Inputs\Search::class => 'input-search',
            \Styde\Form\View\Components\Fields\Inputs\File::class => 'input-file',
            \Styde\Form\View\Components\Fields\Inputs\Textarea::class => 'textarea',
            \Styde\Form\View\Components\Fields\Select::class => 'select',
            \Styde\Form\View\Components\Fields\Radio::class => 'radio',
            \Styde\Form\View\Components\Fields\Selectables\Checkbox::class => 'checkbox',
            \Styde\Form\View\Components\Fields\Selectables\CheckboxMultiple::class => 'checkbox-multiple',
        ];
    }
}
