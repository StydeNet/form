<?php

namespace Styde\Form\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    /** @var string */
    public $id;

    /**
     * FormGroup constructor.
     *
     * @param string|null $id
     * @param string|null $name
     */
    public function __construct(string $id = null, string $name = null)
    {
        $this->id = $this->id($id, $name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::form-group');
    }

    /**
     * Gets the id for the input, which can be passed as an
     * attribute or obtained from the input name
     *
     * @param string|null $id
     * @param string|null $name
     *
     * @return string|null
     */
    protected function id(string $id = null, string $name = null)
    {
        return $id ?: sprintf('field-group-%s', $name);
    }
}
