<?php

namespace Styde\Form;

use Illuminate\Config\Repository;

class RadioField extends Field
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
    /**
     * @var string
     */
    public $help;

    public function __construct(Repository $config, $name, $label = null, $id = null, $help = null, $options = [], $checked = [], $value = 1)
    {
        parent::__construct($config, $name);

        $this->options = $options;
        $this->checked = $checked;
        $this->value = $value;
        $this->help = $help;
    }

    public function render()
    {
        return view('styde-form::field-radio');
    }
}
