<?php

namespace TALLKit\Components\Scripts;

class Turbo extends Script
{
    /**
     * @var bool
     */
    public $livewire;

    /**
     * Create a new component instance.
     *
     * @param  bool|null  $noscript
     * @return void
     */
    public function __construct($livewire = null)
    {
        $this->livewire = $livewire ?? false;
    }
}
