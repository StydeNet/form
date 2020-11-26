<?php

namespace Styde\Form\View\Components\Fields\Selectables;

use Illuminate\Config\Repository as Config;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Fields\Selectable;

class Radio extends Selectable
{
    /**
     * Radio constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $name
     * @param string $option
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, string $option, string $id = null, string $label = null, string $value = null, string $help = null)
    {
        parent::__construct($config, $currentModel, $name, $option, null, $id, $label, $value, $help);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.selectables.radio');
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

    /**
     * Gets the label for the input, which can be passed as an
     * attribute or obtained from the input name
     *
     * @param string|null $label
     * @return string
     */
    protected function label(?string $label)
    {
        return $label ? $label : ucfirst(str_replace('_', ' ', $this->option));
    }
}
