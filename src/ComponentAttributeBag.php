<?php

namespace Styde;

class ComponentAttributeBag extends \Illuminate\View\ComponentAttributeBag
{
    public function __toString()
    {
        $result = parent::__toString();

        return $result != '' ? " {$result}" : '';
    }
}
