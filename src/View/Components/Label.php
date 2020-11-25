<?php

namespace Styde\Form\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    /** @var string|null */
    public $highlight;

    public function __construct(string $highlight = null)
    {
        $this->highlight = $highlight;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::label');
    }
}
