<?php

namespace Styde\Form;

use Illuminate\Config\Repository;

class TextAreaField extends Field
{
    /**
     * @var string
     */
    public $rows;
    /**
     * @var string
     */
    public $help;

    public function __construct(Repository $config, $name, $required = false, $label = null, $id = null, $help = null, $rows = 3)
    {
        parent::__construct($config, $name, $required, $id, $label);

        $this->rows = $rows;
        $this->help = $help;
    }

    public function render()
    {
        return view('styde-form::field-textarea');
    }
}
