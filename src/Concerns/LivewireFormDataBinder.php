<?php

namespace TALLKit\Concerns;

use TALLKit\Binders\FormDataBinder;

trait LivewireFormDataBinder
{
    /**
     * Returns a boolean wether the form is wired to a Livewire component.
     *
     * @return bool
     */
    public function isWired()
    {
        return $this->attributes && count($this->attributes->whereStartsWith('wire:model')->getIterator())
            ? false
            : app(FormDataBinder::class)->isWired();
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

    /**
     * Returns the optional wire modifier.
     *
     * @param  string|null  $modifier
     * @return string
     */
    public function wireModifier($modifier = null)
    {
        $modifier = $modifier ?? app(FormDataBinder::class)->getWireModifier();

        return $modifier ? ".{$modifier}" : null;
    }
}
