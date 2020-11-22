<?php

namespace Styde\Form\View\Components\Fields;

use Styde\Form\View\Components\CustomField;

class Radio extends CustomField
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return count($this->options) > 1 ?
            view('styde-form::fields.radio.multiple') :
            view('styde-form::fields.radio.single');
    }
}
