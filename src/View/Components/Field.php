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
}
