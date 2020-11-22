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
}
