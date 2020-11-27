<?php

namespace Styde\Form\View\Components\Fields\Selectables;

use Illuminate\Config\Repository as Config;
use Illuminate\Support\Collection;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Fields\Selectable;

class SelectMultiple extends Selectable
{
    /**
     * SelectMultiple constructor.
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
        parent::__construct($config, $currentModel, $name, 'null', $options, $id, $label, $value, $help);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.selectables.select-multiple');
    }

    /**
     * Returns selected attribute
     *
     * @param string $key
     * @return string
     */
    public function isSelected(string $key)
    {
        if (in_array($key, old($this->cleanName, []))) {
            return ' selected';
        }

        if ($this->value instanceof Collection) {
            if ($this->value->contains($key)) {
                return ' selected';
            }
        }

        return '';
    }
}
