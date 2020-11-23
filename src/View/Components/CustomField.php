<?php

namespace Styde\Form\View\Components;

use Illuminate\Config\Repository as Config;
use Styde\Form\Support\CurrentModel;

abstract class CustomField extends Field
{
    /** @var string CSS Class for control */
    protected $classes = 'custom-control-input';

    /** @var string|null Input value */
    public $option;

    /** @var array|null Options radios */
    public $options;

    /**
     * Custom Field constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $name
     * @param string|null $option
     * @param array|null $options
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     * @param string|null $required
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, string $option = 'on', array $options = null, string $id = null, string $label = null, string $value = null, string $help = null, string $required = null)
    {
        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help, $required);

        $this->option = $option;

        $this->label = $this->label($label, $this->option, $options);

        if (is_null($options))
            $this->options = [$this->option => $this->label];
        else
            $this->options = $options;
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
     * @param string|null $option
     * @param array|null $options
     * @return string
     */
    protected function label(?string $label, string $option = null, array $options = null)
    {
        if (is_array($options))
            return parent::label($label);

        return $label ? $label : ucfirst(str_replace('_', ' ', $option));
    }

    /**
     * Gets the id for the input, which can be passed as an
     * attribute or obtained from the input name
     *
     * @param string|null $id
     * @return string
     */
    protected function id(?string $id)
    {
        return sprintf('field-%s', $this->cleanName);
    }
}
