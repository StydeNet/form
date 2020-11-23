<?php

namespace Styde\Form\View\Components\Fields;

use Illuminate\Config\Repository as Config;
use Illuminate\Support\Collection;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

class Select extends Field
{
    /** @var string CSS Class for control */
    protected $classes = 'custom-select';

    /** @var array Select options */
    public $options;

    /** @var string|null Empty option */
    public $empty;

    /** @var bool Multiple indicator */
    public $multiple;

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
     * @param string|null $empty
     * @param string|null $help
     * @param string|null $required
     * @param string|null $multiple
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, array $options = [], string $id = null, string $label = null, string $value = null, string $empty = null, string $help = null, string $required = null, string $multiple = null)
    {
        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help, $required);

        $this->options = $options;
        $this->empty = $empty;
        $this->multiple = !is_null($multiple);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.select');
    }

    /**
     * Returns selected attribute
     *
     * @param string $key
     * @param bool $errors
     * @return string
     */
    public function isSelected(string $key, bool $errors = false)
    {
        if ($this->multiple) {
            if ($errors) {
                if (in_array($key, old($this->cleanName, []))) {
                    return ' selected';
                }
            }

            if ($this->value instanceof Collection) {
                if ($this->value->contains($key)) {
                    return ' selected';
                }
            }

            return '';
        } else {
            return $key == $this->value ? ' selected' : '';
        }
    }
}
