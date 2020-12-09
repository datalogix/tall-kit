<?php

namespace Datalogix\TALLKit\Concerns;

use Datalogix\TALLKit\FormDataBinder;

trait BoundValues
{
    /**
     * Get an instance of FormDataBinder.
     *
     * @return \Datalogix\TALLKit\FormDataBinder
     */
    private function getFormDataBinder()
    {
        return app(FormDataBinder::class);
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    private function getBoundTarget()
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
    private function getBoundValue($bind = null, $name = null)
    {
        if ($bind === false) {
            return null;
        }

        $bind = $bind ?: $this->getBoundTarget();

        return data_get($bind, $name);
    }
}
