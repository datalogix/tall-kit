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
}
