<?php

namespace Styde\Form;

use Illuminate\Config\Repository;

class CheckboxField extends Field
{
    /**
     * @var string
     */
    public $options;
    /**
     * @var array
     */
    public $checked;
    /**
     * @var string
     */
    public $value;
    /**
     * @var string
     */
    public $help;

    public function __construct(Repository $config, $name, $id = null, $required = false, $label = null, $help = null, $options = [], $checked = [], $value = 1)
    {
        parent::__construct($config, $name, $required, $id, $label);

        $this->options = $options;
        $this->checked = $checked;
        $this->value = $value;
        $this->help = $help;
    }

    public function isChecked($value)
    {
        return in_array($value, $this->checked);
    }

    public function render()
    {
        return view('styde-form::field-checkbox');
    }
}
