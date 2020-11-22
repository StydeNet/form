<?php

namespace Styde\Form\View\Components;

use Illuminate\View\Component;

abstract class Field extends Component
{
    /** @var string CSS Class for control */
    protected $classes = 'form-control';
}
