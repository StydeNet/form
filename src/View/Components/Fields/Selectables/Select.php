<?php

namespace Styde\Form\View\Components\Fields\Selectables;

use Illuminate\Config\Repository as Config;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

class Select extends Field
{
    /** @var array */
    public $options;

    /**
     * Select constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $name
     * @param array $options
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, array $options = [], string $id = null, string $label = null, string $value = null, string $help = null)
    {
        $this->options = $options;

        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.selectables.select');
    }

    /**
     * Returns selected attribute
     *
     * @param string $key
     * @return string
     */
    public function isSelected(string $key)
    {
        return $key == $this->value ? ' selected' : '';
    }
}
