<?php

namespace Styde\Form\View\Components\Fields\Inputs;

use Illuminate\Config\Repository as Config;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

class Input extends Field
{
    /** @var string */
    public $type;

    public function __construct(Config $config, CurrentModel $currentModel, string $type, string $name, string $id = null, string $label = null, string $value = null, string $help = null)
    {
        $this->type = $type;

        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.inputs.input');
    }
}
