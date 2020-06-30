<?php

namespace Styde\Form;

use Illuminate\Config\Repository;
use Illuminate\View\Component;

class Field extends Component
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $type = 'text';
    /**
     * @var bool
     */
    public $required;
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $help;
    /**
     * @var Repository
     */
    private $config;

    public function __construct(Repository $config, string $name, $required = false, $id = null, $label = null, $help = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
        $this->id = $id;
        $this->help = $help;
        $this->config = $config;
    }

    public function highlightsRequired()
    {
        return $this->config->get('form.highlights_requirement') === 'required' && $this->required;
    }

    public function highlightsOptional()
    {
        return $this->config->get('form.highlights_requirement') === 'optional' && ! $this->required;
    }

    public function label()
    {
        if ($this->label != null) {
            return $this->label;
        }

        return ucfirst(str_replace('_', ' ', $this->name));
    }

    public function classes()
    {
        return 'form-control';
    }

    public function render()
    {
        return      view('styde-form::field');
    }
}
