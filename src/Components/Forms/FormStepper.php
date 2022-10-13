<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Collection;

class FormStepper extends Form
{
    /**
     * @var string
     */
    public $mode;

    /**
     * @var string|null
     */
    public $title;

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
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|bool|null  $target
     * @param  string|bool|null  $action
     * @param  string|string[]|null  $route
     * @param  mixed  $bind
     * @param  string|bool|null  $modelable
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  mixed  $fields
     * @param  strin|null  $mode
     * @param  strin|null  $title
     * @param  mixed  $steps
     * @param  int|null  $current
     * @param  bool|null  $prev
     * @param  bool|null  $next
     * @param  bool|null  $loading
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $init = null,
        $method = null,
        $target = null,
        $action = null,
        $route = null,
        $bind = null,
        $modelable = null,
        $enctype = null,
        $confirm = null,
        $fields = null,
        $mode = null,
        $title = null,
        $steps = null,
        $current = null,
        $prev = null,
        $next = null,
        $loading = null,
        $theme = null
    ) {
        parent::__construct(
            $init,
            $method,
            $target,
            $action,
            $route,
            $bind,
            $modelable,
            $enctype,
            $confirm,
            $fields,
            $theme
        );

        $this->mode = $mode ?? 'horizontal';
        $this->title = $title;
        $this->steps = Collection::make($steps);
        $this->current = $current ?? 1;
        $this->prev = $prev ?? true;
        $this->next = $next ?? true;
        $this->loading = $loading ?? true;
    }
}
