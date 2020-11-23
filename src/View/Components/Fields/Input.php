<?php

namespace Styde\Form\View\Components\Fields;

use Illuminate\Config\Repository as Config;
use InvalidArgumentException;
use Styde\Form\Support\CurrentModel;
use Styde\Form\View\Components\Field;

class Input extends Field
{
    /** @var string[] Valid types */
    private const TYPES = [
        'text', 'password', 'number', 'url', 'search', 'email', 'hidden', 'range', 'file', 'color',
        'date', 'month', 'week', 'time', 'datetime-local'
    ];

    /** @var string Input type */
    public $type;

    /**
     * Input constructor.
     *
     * @param Config $config
     * @param CurrentModel $currentModel
     * @param string $type
     * @param string $name
     * @param string|null $id
     * @param string|null $label
     * @param string|null $value
     * @param string|null $help
     * @param string|null $required
     */
    public function __construct(Config $config, CurrentModel $currentModel, string $type, string $name, string $id = null, string $label = null, string $value = null, string $help = null, string $required = null)
    {
        if (!in_array($type, self::TYPES))
            throw new InvalidArgumentException(sprintf('Expected [%s] obtaining "%s"', implode(', ', self::TYPES), $type));

        parent::__construct($config, $currentModel, $name, $id, $label, $value, $help, $required);

        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('styde-form::fields.input');
    }
}
