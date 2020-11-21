<?php

namespace Datalogix\TALLKit\Traits;

use Datalogix\TALLKit\FormDataBinder;

trait HandlesLivewireFormDataBinder
{
    /**
     * Returns a boolean wether the form is wired to a Livewire component.
     *
     * @return bool
     */
    public function isWired()
    {
        return app(FormDataBinder::class)->isWired();
    }

    /**
     * The inversion of 'isWired()'.
     *
     * @return bool
     */
    public function isNotWired()
    {
        return ! $this->isWired();
    }
}
