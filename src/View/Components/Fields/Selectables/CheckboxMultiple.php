<?php

namespace Styde\Form\View\Components\Fields\Selectables;

use Illuminate\Config\Repository as Config;
use Illuminate\Support\Collection;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

class CheckboxMultiple extends Field
{
    /** @var array */
    public $options;

    /**
     * CheckboxMultiple constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $name
     * @param array|null $options
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, array $options, string $id = null, string $label = null, string $value = null, string $help = null)
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
        return view('styde-form::fields.selectables.checkbox-multiple');
    }

    /**
     * Returns checked attribute
     *
     * @param string $key
     * @return string
     */
    public function isChecked(string $key)
    {
        if (in_array($key, old($this->cleanName, []))) {
            return ' checked';
        }

        if ($this->value instanceof Collection) {
            if ($this->value->contains($key)) {
                return ' checked';
            }
        }

        return '';
    }
}
