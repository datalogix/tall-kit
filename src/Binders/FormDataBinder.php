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
     * Bind a target to the current instance.
     *
     * @param  mixed  $target
     * @return void
     */
    public function bind($target)
    {
        $this->bindings[] = $target;
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    public function get()
    {
        return Arr::last($this->bindings);
    }

    /**
     * Remove the last binding target.
     *
     * @return void
     */
    public function pop()
    {
        array_pop($this->bindings);
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
     * @return void
     */
    public function wire($modifier = null)
    {
        $this->wire = $modifier;
    }

    /**
     * Disable Livewire binding.
     *
     * @return void
     */
    public function endWire()
    {
        $this->wire = false;
    }

    /**
     * Returns the modifier, if set.
     *
     * @return string|null
     */
    public function getWireModifier()
    {
        return is_string($this->wire) ? $this->wire : null;
    }
}
