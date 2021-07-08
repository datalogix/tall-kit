<?php

namespace TALLKit\Components\Menus;

use TALLKit\Components\BladeComponent;

class Menu extends BladeComponent
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
        $inline = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->items = $items;
        $this->inline = $inline;
    }
}
