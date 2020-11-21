<?php

namespace Datalogix\TALLKit\Components\Navigations;

use Datalogix\TALLKit\Components\BladeComponent;

class Menu extends BladeComponent
{
    /**
     * The menu items.
     *
     * @var array
     */
    public $items;

    /**
     * The menu inline.
     *
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
