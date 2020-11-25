<?php

namespace Styde\Form\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Styde\Form\Support\CurrentModel;

class FormGroup extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::form-group');
    }
}
