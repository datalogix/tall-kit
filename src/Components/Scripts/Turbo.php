<?php

namespace TALLKit\Components\Scripts;

use TALLKit\Components\BladeComponent;

class Turbo extends BladeComponent
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
        parent::__construct(null);

        $this->livewire = $livewire ?? false;
    }
}
