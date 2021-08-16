<?php

namespace TALLKit\Components\Menus;

use TALLKit\Components\Navigations\Nav;

class Menu extends Nav
{
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
        parent::__construct($items, $inline, $theme);
    }
}
