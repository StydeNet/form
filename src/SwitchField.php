<?php

namespace Styde\Form;

use Illuminate\Config\Repository;

class SwitchField extends Field
{
    /**
     * @var string
     */
    public $options;

    /**
     * @var string
     */
    public $checked;

    /**
     * @var string
     */
    public $value;

    public function __construct(Repository $config, $name, $label = null, $id = null, $help = null, $options = [], $checked = [], $value = 1)
    {
        parent::__construct($config, $name, $label, $id, $help);

        $this->options = $options;
        $this->checked = $checked;
        $this->value = $value;
    }

    public function render()
    {
        return view('styde-form::field-switch');
    }
}
