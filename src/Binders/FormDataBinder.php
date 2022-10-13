<?php

namespace TALLKit\Binders;

use Illuminate\Support\Arr;

class FormDataBinder
{
    /**
     * Tree of bound targets.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * Wired to a Livewire component.
     *
     * @var bool
     */
    protected $wire = false;

    /**
     * Model to a Alpine component.
     *
     * @var bool
     */
    protected $model = false;

    /**
     * Bind a target to the current instance.
     *
     * @param  mixed  $target
     * @return \TALLKit\Binders\FormDataBinder
     */
    public function bind($target)
    {
        $this->bindings[] = $target;

        return $this;
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    public function getBind()
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding target.
     *
     * @return \TALLKit\Binders\FormDataBinder
     */
    public function endBind()
    {
        array_pop($this->bindings);

        return $this;
    }

    /**
     * Returns wether the form is bound to a Livewire model.
     *
     * @return bool
     */
    public function isWired()
    {
        return $this->wire !== false;
    }

    /**
     * Enable Livewire binding with an optional modifier.
     *
     * @param  string|null  $modifier
     * @return \TALLKit\Binders\FormDataBinder
     */
    public function wire($modifier = null)
    {
        $this->wire = $modifier;

        return $this;
    }

    /**
     * Disable Livewire binding.
     *
     * @return \TALLKit\Binders\FormDataBinder
     */
    public function endWire()
    {
        $this->wire = false;

        return $this;
    }

    /**
     * Returns the wire modifier, if set.
     *
     * @return string|null
     */
    public function getWireModifier()
    {
        return is_string($this->wire) ? $this->wire : null;
    }

    /**
     * Returns wether the form is bound to a Alpine model.
     *
     * @return bool
     */
    public function isModel()
    {
        return $this->model !== false && ! $this->isWired();
    }

    /**
     * Enable Alpine binding with an optional modifier.
     *
     * @param  string|bool|null  $modifier
     * @return \TALLKit\Binders\FormDataBinder
     */
    public function model($modifier = null)
    {
        $this->model = $modifier;

        return $this;
    }

    /**
     * Disable Alpine binding.
     *
     * @return \TALLKit\Binders\FormDataBinder
     */
    public function endModel()
    {
        $this->model = false;

        return $this;
    }

    /**
     * Returns the model modifier, if set.
     *
     * @return string|null
     */
    public function getModelModifier()
    {
        return is_string($this->model) ? $this->model : null;
    }
}
