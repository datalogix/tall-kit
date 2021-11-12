<?php

namespace TALLKit\Components\Menus;

use TALLKit\Components\Navigations\Nav;

class Menu extends Nav
{
    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  bool|null  $inline
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $inline = null,
        $theme = null
    ) {
        parent::__construct($items, $inline ?? false, $theme);
    }
}
