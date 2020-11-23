<?php

namespace Styde\Form\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Styde\Form\Support\CurrentModel;

class Form extends Component
{
    /** @var string Form method */
    public $method;

    /** @var CurrentModel Current model in form */
    private $currentModel;

    /**
     * Form constructor.
     *
     * @param CurrentModel $currentModel
     * @param string $method
     * @param Model|null $model
     */
    public function __construct(CurrentModel $currentModel, string $method = 'get', Model $model = null)
    {
        $this->method = $method;
        $this->currentModel = $currentModel;
        $this->currentModel->set($model);
    }

    /**
     * Form destructor.
     */
    public function __destruct()
    {
        $this->currentModel->remove();
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
