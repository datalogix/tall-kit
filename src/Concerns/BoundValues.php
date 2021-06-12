<?php

namespace TALLKit\Concerns;

use TALLKit\Binders\FormDataBinder;

trait BoundValues
{
    /**
     * Get an instance of FormDataBinder.
     *
     * @return \TALLKit\Binders\FormDataBinder
     */
    protected function getFormDataBinder()
    {
        return app(FormDataBinder::class);
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    protected function getBoundTarget()
    {
        return $this->getFormDataBinder()->get();
    }

    /**
     * Get an item from the latest bound target.
     *
     * @param  mixed  $bind
     * @param  string  $name
     * @return mixed
     */
    protected function getBoundValue($bind = null, $name = null)
    {
        if ($bind === false) {
            return null;
        }

        $bind = $bind ?: $this->getBoundTarget();

        return data_get($bind, $name);
    }
}
