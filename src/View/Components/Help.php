<?php

namespace Styde\Form\View\Components;

use Illuminate\View\Component;

class Help extends Component
{
    /** @var bool */
    public $hasErrors;

    /**
     * Help constructor.
     *
     * @param bool $hasErrors
     */
    public function __construct(bool $hasErrors = false)
    {
        $this->hasErrors = $hasErrors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::help');
    }
}
