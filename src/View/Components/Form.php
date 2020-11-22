<?php

namespace Styde\Form\View\Components;

use Illuminate\Cache\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Form extends Component
{
    /** @var string Form method */
    public $method;

    /** @var Repository Model */
    private $cache;

    /**
     * Form constructor.
     *
     * @param Repository $cache
     * @param string $method
     * @param Model|null $model
     */
    public function __construct(Repository $cache, string $method = 'get', Model $model = null)
    {
        $this->method = $method;
        $this->cache = $cache;

        if ($model) {
            $this->cache->put('b-model', $model);
        }
    }

    /**
     * Form destruct
     */
    public function __destruct()
    {
        $this->cache->forget('b-model');
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
