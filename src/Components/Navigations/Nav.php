<?php

namespace TALLKit\Components\Navigations;

use TALLKit\Components\BladeComponent;

class Nav extends BladeComponent
{
    /**
     * @var array
     */
    public $items;

    /**
     * @var bool
     */
    public $inline;

    /**
     * Create a new component instance.
     *
     * @param  array  $items
     * @param  bool  $inline
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = [],
        $inline = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->items = $items;
        $this->inline = $inline;
    }
}
