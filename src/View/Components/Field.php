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
}
