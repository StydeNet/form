<?php

namespace Styde\Form;

use Illuminate\View\Component;

class SubmitButton extends Component
{
    /**
     * @var string
     */
    public $type = 'submit';

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    private $label;

    public function __construct(
        $id = null,
        $label = null
    ) {
        $this->id = $id;
        $this->label = $label;
    }

    public function label()
    {
        if ($this->label != null) {
            return $this->label;
        }

        return 'Submit';
    }

    public function classes()
    {
        return 'btn';
    }

    public function render()
    {
        return view('styde-form::button-submit');
    }
}
