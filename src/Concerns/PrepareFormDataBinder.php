<?php

namespace TALLKit\Concerns;

use TALLKit\Binders\FormDataBinder;

trait PrepareFormDataBinder
{
    /**
     * Start form data binder.
     *
     * @param  mixed  $bind
     * @param  string|bool|null  $modelable
     * @return void
     */
    public function startFormDataBinder($bind = null, $modelable = null)
    {
        app(FormDataBinder::class)
            ->bind($bind)
            ->model($modelable ?? false);
    }

    /**
     * End form data binder.
     *
     * @return void
     */
    public function endFormDataBinder()
    {
        app(FormDataBinder::class)
            ->endModel()
            ->endBind();
    }
}
