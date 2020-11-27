<?php

namespace Styde\Form\View\Components\Fields;

use Illuminate\Config\Repository as Config;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

abstract class Selectable extends Field
{
    /** @var string|null Input value */
    public $option;

    /** @var array|null Options radios */
    public $options;

    public function __construct(Config $config, CurrentModel $currentModel, string $name, string $option = 'true', array $options = null, string $id = null, string $label = null, string $value = null, string $help = null)
    {
        $this->option = $option;
        $this->options = $options;

        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help);
    }
}
