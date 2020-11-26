<?php

namespace Tests;

use Illuminate\Support\ViewErrorBag;
use Tests\Models\User;

class FormInputTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->share('errors', new ViewErrorBag);
    }

    /** @test */
    function render_a_form_with_the_provided_model_and_getting_its_values_in_the_input()
    {
        $this->markTestIncomplete();

        $model = new User([
            'name' => 'Luis',
            'email' => 'luilliarcec@gmail.com',
        ]);

        $this->template('
            <x-form method="post" :model="$model">
                <x-input type="text" name="name"/>
                <x-input type="email" name="email"/>
            </x-form>
        ')->withData('model', $model)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                    <div id="field-group-name" class="form-group">
                        <label for="field-name" > Name </label>
                        <input type="text" id="field-name" name="name" class="form-control" value="Luis">
                    </div>
                    <div id="field-group-email" class="form-group">
                        <label for="field-email" > Email </label>
                        <input type="email" id="field-email" name="email" class="form-control" value="luilliarcec@gmail.com">
                    </div>
                </form>
            ');
    }

    /** @test */
    function render_a_form_with_the_provided_model_omitting_hidden_values()
    {
        $this->markTestIncomplete();

        $model = new User([
            'name' => 'Luis',
            'password' => 'no_show'
        ]);

        $this->template('
            <x-form method="post" :model="$model">
                <x-input type="text" name="name"/>
                <x-input type="password" name="password"/>
            </x-form>
        ')->withData('model', $model)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                    <div id="field-group-name" class="form-group">
                        <label for="field-name" > Name </label>
                        <input type="text" id="field-name" name="name" class="form-control" value="Luis">
                    </div>
                    <div id="field-group-password" class="form-group">
                        <label for="field-password" > Password </label>
                        <input type="password" id="field-password" name="password" class="form-control" value="">
                    </div>
                </form>
            ');
    }

    /** @test */
    function render_two_independent_forms_of_the_model()
    {
        $this->markTestIncomplete();

        $model = new User([
            'name' => 'Luis',
            'password' => 'no_show'
        ]);

        $this->template('
            <x-form method="post" :model="$model">
                <x-input type="text" name="name"/>
                <x-input type="password" name="password"/>
            </x-form>

            <x-form method="post">
                <x-input type="text" id="product_name" name="name" label="Product name"/>
                <x-input type="password" name="email"/>
            </x-form>
        ')->withData('model', $model)
            ->assertRender('
                <form method="post" >
                    ' . csrf_field() . '
                    <div id="field-group-name" class="form-group">
                        <label for="field-name" > Name </label>
                        <input type="text" id="field-name" name="name" class="form-control" value="Luis">
                    </div>
                    <div id="field-group-password" class="form-group">
                        <label for="field-password" > Password </label>
                        <input type="password" id="field-password" name="password" class="form-control" value="">
                    </div>
                </form>
                <form method="post" >
                    <input type="hidden" name="_token" value="">
                    <div id="field-group-name" class="form-group">
                        <label for="product_name" > Product name </label>
                        <input type="text" id="product_name" name="name" class="form-control" value="">
                    </div>
                    <div id="field-group-email" class="form-group">
                        <label for="field-email" > Email </label>
                        <input type="password" id="field-email" name="email" class="form-control" value="">
                    </div>
                </form>
            ');
    }
}
