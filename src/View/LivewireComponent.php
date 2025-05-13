<?php

namespace TALLKit\View;

use Livewire\Component;
use TALLKit\Concerns\Componentable;

abstract class LivewireComponent extends Component
{
    use Componentable;

    /**
     * The theme name.
     *
     * @var string|null
     */
    public $theme;
}
