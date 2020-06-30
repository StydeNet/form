<?php

namespace Styde\Form;

class FileBrowserField extends Field
{
    /**
     * @var string
     */
    public $type = 'file';

    public function classes()
    {
        return 'custom-file-input';
    }

    public function render()
    {
        return view('styde-form::field-file-browser');
    }
}
