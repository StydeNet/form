<?php

namespace Styde\Form\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /** @var string Form method */
    public $method;

    /**
     * Form constructor.
     *
     * @param string $method
     */
    public function __construct(string $method = 'get')
    {
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::form');
    }

    /**
     * Returns the http method that will go in the form html
     *
     * @return string
     */
    public function httpMethod()
    {
        if ($this->spoofedMethod()) {
            return 'post';
        }

        return $this->method;
    }

    /**
     * Check if the method is put patch or delete
     *
     * @return bool
     */
    public function spoofedMethod()
    {
        return in_array($this->method, ['put', 'patch', 'delete']);
    }
}
