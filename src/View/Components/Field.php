<?php

namespace Styde\Form\View\Components;

use Illuminate\Cache\Repository as Cache;
use Illuminate\Config\Repository as Config;
use Illuminate\View\Component;

abstract class Field extends Component
{
    /** @var string CSS Class for control */
    protected $classes = 'form-control';

    /** @var Config */
    private $config;

    /** @var Cache */
    private $cache;

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
     * @param Cache $cache
     * @param string $name
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     * @param string|null $required
     */
    public function __construct(Config $config, Cache $cache, string $name, string $id = null, string $label = null, string $value = null, string $help = null, string $required = null)
    {
        $this->config = $config;
        $this->cache = $cache;
        $this->name = $name;
        $this->cleanName = $this->cleanName($name);
        $this->label = $this->label($label);
        $this->value = $this->value($value);
        $this->id = $this->id($id);
        $this->required = !is_null($required);
        $this->help = $help;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    abstract public function render();

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
     * Obtains the value of the input, which can be passed as an attribute to the component
     * or obtained from the form model, both checked in the old function.
     *
     * @param string|null $value
     * @return string|null
     */
    protected function value(?string $value)
    {
        $model = $this->cache->get('b-model');

        if (is_object($model)) {
            if (!in_array($this->name, $model->getHidden())) {
                return old($this->name, $model->{$this->cleanName});
            }
        }

        return old($this->name, $value);
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
     * Return the name without brackets for a multi select
     *
     * @param string $name
     * @return string
     */
    protected function cleanName(string $name)
    {
        return str_replace('[]', '', $name);
    }
}
