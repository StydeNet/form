<?php

namespace Styde\Form\View\Components\Fields;

use Illuminate\Support\Collection;
use Styde\Form\View\Components\CustomField;

class Checkbox extends CustomField
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return count($this->options) > 1 ?
            view('styde-form::fields.checkbox.multiple') :
            view('styde-form::fields.checkbox.single');
    }

    /**
     * Returns checked attribute
     *
     * @param string $key
     * @param bool $errors
     * @return string
     */
    public function isChecked(string $key = 'on', bool $errors = false)
    {
        if (count($this->options) > 1) {
            if ($errors) {
                if (in_array($key, old($this->cleanName, []))) {
                    return ' checked';
                }
            }

            if ($this->value instanceof Collection) {
                if ($this->value->contains($key)) {
                    return ' checked';
                }
            }

            return '';
        } else {
            return $this->value && $key == $this->value ? ' checked' : '';
        }
    }
}
