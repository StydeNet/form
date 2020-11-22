<?php

namespace Styde\Form;

use Illuminate\Support\ServiceProvider;

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
            // Registering package commands.

            // Publishing config.
            $this->publishes([
                __DIR__ . '/../config/form.php' => config_path('form.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/styde-form'),
            ], 'views');

            // Publishing the translation files.
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/styde-form'),
            ], 'lang');
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
            \Styde\Form\View\Components\Fields\Input::class => 'input',
            \Styde\Form\View\Components\Fields\Textarea::class => 'textarea',
            \Styde\Form\View\Components\Fields\Select::class => 'select',
            \Styde\Form\Field::class => 'field',
            \Styde\Form\PasswordField::class => 'field-password',
            \Styde\Form\NumberField::class => 'field-number',
            \Styde\Form\SelectField::class => 'field-select',
            \Styde\Form\CheckboxField::class => 'field-checkbox',
            \Styde\Form\RadioField::class => 'field-radio',
            \Styde\Form\TextAreaField::class => 'field-textarea',
            \Styde\Form\FileField::class => 'field-file',
            \Styde\Form\SubmitButton::class => 'submit',
            \Styde\Form\RangeField::class => 'field-range',
            \Styde\Form\SwitchField::class => 'field-switch',
            \Styde\Form\FileBrowserField::class => 'field-file-browser',
        ];
    }
}
