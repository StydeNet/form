<?php

namespace Styde\Form\View\Components\Fields\Selectables;

class SwitcheMultiple extends CheckboxMultiple
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.selectables.switch-multiple');
    }
}
