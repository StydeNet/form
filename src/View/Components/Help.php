<?php

namespace Styde\Form\View\Components;

use Illuminate\View\Component;

class Help extends Component
{
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
