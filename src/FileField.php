<?php

namespace Styde\Form;

class FileField extends Field
{
    /**
     * @var string
     */
    public $type = 'file';

    public function classes()
    {
        return 'form-control-file';
    }
}
