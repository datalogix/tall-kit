<?php

namespace TALLKit\Concerns;

use TALLKit\Binders\FormDataBinder;

trait BoundValues
{
    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    protected function getBoundTarget()
    {
        return app(FormDataBinder::class)->getBind();
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

        $bind = $bind ?? $this->getBoundTarget();

        return target_get($bind, $name);
    }
}
