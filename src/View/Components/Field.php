<?php

namespace Styde\Form\View\Components;

use Illuminate\Config\Repository as Config;
use Illuminate\View\Component;
use Styde\Form\Support\CurrentModel;

abstract class Field extends Component
{
    /** @var string CSS Class for control */
    protected $classes = 'form-control';

    /** @var Config */
    private $config;

    /** @var CurrentModel */
    private $currentModel;

    /** @var string Input name sanitized */
    public $cleanName;

    /** @var string Input name */
    public $name;

    /** @var string Input id */
    public $id;

    /** @var string Input label */
    public $label;

    /** @var string|null Input value */
    public $value;

    /** @var string|null Input help */
    public $help;

    /** @var bool Required indicator */
    public $required;

    /**
     * Field constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $name
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     * @param string|null $required
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $name, string $id = null, string $label = null, string $value = null, string $help = null, string $required = null)
    {
        $this->config = $config;
        $this->currentModel = $currentModel;
        $this->name = $name;
        $this->cleanName = $this->cleanName($name);
        $this->label = $this->label($label);
        $this->value = $this->value($value);
        $this->id = $this->id($id);
        $this->required = !is_null($required);
        $this->help = $help;
    }

    /**
     * Returns css style for control
     *
     * @param bool $has_error
     * @return string
     */
    public function styles(bool $has_error)
    {
        return $has_error ? sprintf('%s is-invalid', $this->classes) : $this->classes;
    }

    /**
     * Returns highlights attributes
     *
     * @param string|null $attribute
     * @return string|null
     */
    public function highlights(string $attribute = null)
    {
        if ($this->config->get('form.highlights.required.activated') && $this->required) {
            if (is_null($attribute))
                return true;

            return $this->config->get('form.highlights.required.' . $attribute);

        } elseif ($this->config->get('form.highlights.optional.activated')) {
            if (is_null($attribute))
                return true;

            return $this->config->get('form.highlights.optional.' . $attribute);
        }

        return false;
    }

    /**
     * Return the name without brackets for a multi select
     *
     * @param string $name
     * @return string
     */
    protected function cleanName(string $name)
    {
        return str_replace('[]', '', $name);
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
        return $id ? $id : sprintf('field-%s', $this->cleanName);
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
        return $label ? $label : ucfirst(str_replace('_', ' ', $this->cleanName));
    }

    /**
     * Obtains the value of the input, which can be passed as an attribute to the component
     * or obtained from the form model, both checked in the old function.
     *
     * @param string|null $value
     * @return string|null
     */
    protected function value(?string $value)
    {
        $model = $this->currentModel->get();

        if (is_object($model)) {
            if (!in_array($this->name, $model->getHidden())) {
                return old($this->name, $model->{$this->cleanName});
            }
        }

        return old($this->name, $value);
    }
}
