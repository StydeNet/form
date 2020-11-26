<?php

namespace Styde\Form\View\Components\Fields\Selectables;

use Styde\Form\View\Components\Fields\Selectable;

class Checkbox extends Selectable
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.selectables.checkbox');
    }

    /**
     * Returns checked attribute
     *
     * @param string $key
     * @return string
     */
    public function isChecked(string $key)
    {
        return $key == $this->value ? ' checked' : '';
    }
}
