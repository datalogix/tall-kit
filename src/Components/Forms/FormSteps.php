<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Collection;
use TALLKit\Components\BladeComponent;

class FormSteps extends BladeComponent
{
    /**
     * @var string
     */
    public $mode;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $steps;

    /**
     * @var int
     */
    public $current;

    /**
     * Create a new component instance.
     *
     * @param  strin|null  $mode
     * @param  mixed  $steps
     * @param  int|null  $current
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $mode = null,
        $steps = null,
        $current = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->mode = $mode ?? 'horizontal';
        $this->steps = Collection::make($steps);
        $this->current = $current ?? 1;
    }
}
