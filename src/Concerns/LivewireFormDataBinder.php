<?php

namespace Datalogix\TALLKit\Concerns;

use Datalogix\TALLKit\FormDataBinder;

trait LivewireFormDataBinder
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
