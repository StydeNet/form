<?php

namespace Styde;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * @var string
     */
    public $method;

    public function __construct($method = 'get')
    {
        $this->method = $method;
    }

    public function render()
    {
        return view('styde-form::form');
    }
}
