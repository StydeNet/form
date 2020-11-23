<?php

namespace Styde\Form\View\Components\Fields;

use Illuminate\Config\Repository as Config;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

class Textarea extends Field
{
    /** @var string */
    public $rows;

    /**
     * Textarea constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $name
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string $rows
     * @param string|null $help
     * @param string|null $required
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, string $id = null, string $label = null, string $value = null, string $rows = "3", string $help = null, string $required = null)
    {
        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help, $required);

        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.textarea');
    }
}
