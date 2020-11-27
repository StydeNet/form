<?php

namespace Tests\Integration;

use Illuminate\Support\ViewErrorBag;
use Tests\Models\User;
use Tests\TestCase;

class FormTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function render_a_form_with_the_model_values()
    {
        $model = new User([
            'name' => 'Luis',
            'email' => 'luilliarcec@gmail.com',
            'is_admin' => true,
            'biography' => 'I am developer',
            'age' => 24,
            'github' => 'https://github.com/luilliarcec'
        ]);

        $this->template('
            <x-form method="post" :model="$model">
                <x-input-text name="name"/>
                <x-input-email name="email"/>
                <x-checkbox name="is_admin"/>
                <x-textarea name="biography"/>
                <x-input-number name="age"/>
                <x-input-url name="github"/>
            </x-form>
        ')->withData('model', $model)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                    <div id="field-group-name" class="form-group">
                        <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                        <input type="text" id="field-name" name="name" value="Luis" class="form-control">
                    </div>
                    <div id="field-group-email" class="form-group">
                        <label for="field-email"> Email <span class="badge badge-danger">Optional</span> </label>
                        <input type="email" id="field-email" name="email" value="luilliarcec@gmail.com" class="form-control">
                    </div>
                    <div id="field-group-is_admin" class="custom-control custom-checkbox">
                        <input type="checkbox" id="field-is_admin" name="is_admin" value="true" class="custom-control-input" checked >
                        <label class="custom-control-label" for="field-is_admin">Is admin</label>
                    </div>
                    <div id="field-group-biography" class="form-group">
                        <label for="field-biography"> Biography <span class="badge badge-danger">Optional</span> </label>
                        <textarea id="field-biography" name="biography" rows="3" class="form-control">I am developer</textarea>
                    </div>
                    <div id="field-group-age" class="form-group">
                        <label for="field-age"> Age <span class="badge badge-danger">Optional</span> </label>
                        <input type="number" id="field-age" name="age" value="24" class="form-control">
                    </div>
                    <div id="field-group-github" class="form-group">
                        <label for="field-github"> Github <span class="badge badge-danger">Optional</span> </label>
                        <input type="url" id="field-github" name="github" value="https://github.com/luilliarcec" class="form-control">
                    </div>
                </form>
            ');
    }

    /** @test */
    function render_a_form_with_the_model_values_excluding_hidden_attributes()
    {
        $model = new User([
            'name' => 'Luis Andrés',
            'password' => 'no_show'
        ]);

        $this->template('
            <x-form method="post" :model="$model">
                <x-input-text name="name"/>
                <x-input-password name="password"/>
            </x-form>
        ')->withData('model', $model)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                    <div id="field-group-name" class="form-group">
                        <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                        <input type="text" id="field-name" name="name" value="Luis Andrés" class="form-control">
                    </div>
                    <div id="field-group-password" class="form-group">
                        <label for="field-password"> Password <span class="badge badge-danger">Optional</span> </label>
                        <input type="password" id="field-password" name="password" value="" class="form-control">
                    </div>
                </form>
            ');
    }

    /** @test */
    function render_two_independent_forms_of_the_model()
    {
        $model = new User([
            'name' => 'Luis',
            'password' => 'no_show'
        ]);

        $this->template('
            <x-form method="post" :model="$model">
                <x-input-text name="name"/>
                <x-input-password name="password"/>
            </x-form>

            <x-form method="post">
                <x-input-text id="product_name" name="name" label="Product name"/>
                <x-input-password name="email"/>
            </x-form>
        ')->withData('model', $model)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                        <div id="field-group-name" class="form-group">
                            <label for="field-name"> Name <span class="badge badge-danger">Optional</span> </label>
                            <input type="text" id="field-name" name="name" value="Luis" class="form-control">
                        </div>
                        <div id="field-group-password" class="form-group">
                            <label for="field-password"> Password <span class="badge badge-danger">Optional</span> </label>
                            <input type="password" id="field-password" name="password" value="" class="form-control">
                        </div>
                </form>
                <form method="post" >
                    <input type="hidden" name="_token" value="">
                        <div id="field-group-name" class="form-group">
                            <label for="product_name"> Product name <span class="badge badge-danger">Optional</span> </label>
                            <input type="text" id="product_name" name="name" value="" class="form-control">
                        </div>
                        <div id="field-group-email" class="form-group">
                            <label for="field-email"> Email <span class="badge badge-danger">Optional</span> </label>
                            <input type="password" id="field-email" name="email" value="" class="form-control">
                        </div>
                </form>
            ');
    }
}
