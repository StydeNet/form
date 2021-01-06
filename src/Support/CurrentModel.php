<?php

namespace Styde\Form\Support;

use Illuminate\Database\Eloquent\Model;

class CurrentModel
{
    /**
     * @var Model|null Current Model
     */
    private $model;

    /**
     * Set Current Model
     *
     * @param Model|null $model
     */
    public function set(?Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get Current Model
     *
     * @return Model
     */
    public function get()
    {
        return $this->model;
    }

    /**
     * Remove current model
     */
    public function remove()
    {
        $this->model = null;
    }
}
