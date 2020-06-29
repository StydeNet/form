<?php

namespace Styde\Form;

class RangeField extends Field
{
    /**
     * @var string
     */
    public $type = 'range';

    public function classes()
    {
        return 'custom-range';
    }
}
