<?php

namespace Styde\Form;

use Illuminate\Config\Repository;

class SelectField extends Field
{
    /**
     * @var string
     */
    public $options;
    /**
     * @var string
     */
    public $empty;
    /**
     * @var bool
     */
    public $multiple;
    /**
     * @var Repository
     */
    private $config;

    public function __construct(Repository $config, $name, $options = [], $empty = null, $multiple = false)
    {
        parent::__construct($config, $name);

        $this->options = $options;
        $this->empty = $empty;
        $this->multiple = $multiple;
    }

    public function placeholder()
    {
        if ($this->empty != null) {
            return $this->empty;
        }

        return '-';
    }

    public function classes()
    {
        return 'custom-select';
    }

    public function render()
    {
        return view('styde-form::field-select');
    }
}
