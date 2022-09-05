<?php

namespace TALLKit\Concerns;

use TALLKit\Binders\FormDataBinder;

trait AlpineFormDataBinder
{
    /**
     * Returns a boolean wether the form is model to a Alpine component.
     *
     * @return bool
     */
    public function isModel()
    {
        return $this->attributes && count($this->attributes->whereStartsWith('x-model')->getIterator())
            ? false
            : app(FormDataBinder::class)->isModel();
    }

    /**
     * The inversion of 'isModel()'.
     *
     * @return bool
     */
    public function isNotModel()
    {
        return ! $this->isModel();
    }

    /**
     * Returns the optional model modifier.
     *
     * @param  string|null  $modifier
     * @return string
     */
    public function modelModifier($modifier = null)
    {
        $modifier = $modifier ?? app(FormDataBinder::class)->getModelModifier();

        return $modifier ? ".{$modifier}" : null;
    }

    /**
     * Returns the model name.
     *
     * @param  string  $name
     * @return string
     */
    public function modelName($name)
    {
        return 'form.'.$name;
    }
}
