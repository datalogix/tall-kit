<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Collection;
use TALLKit\Components\BladeComponent;

class FormStepper extends BladeComponent
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
     * @var bool
     */
    public $prev;

    /**
     * @var bool
     */
    public $next;

    /**
     * @var bool
     */
    public $loading;

    /**
     * Create a new component instance.
     *
     * @param  strin|null  $mode
     * @param  mixed  $steps
     * @param  int|null  $current
     * @param  bool|null  $prev
     * @param  bool|null  $next
     * @param  bool|null  $loading
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $mode = null,
        $steps = null,
        $current = null,
        $prev = null,
        $next = null,
        $loading = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->mode = $mode ?? 'horizontal';
        $this->steps = Collection::make($steps);
        $this->current = $current ?? 1;
        $this->prev = $prev ?? true;
        $this->next = $next ?? true;
        $this->loading = $loading ?? true;
    }
}
