<?php

namespace TALLKit\Components\Menus;

use TALLKit\Components\BladeComponent;

class Nav extends BladeComponent
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $items;

    /**
     * @var bool
     */
    public $inline;

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
        parent::__construct($theme);

        $this->items = collect_value($items);
        $this->inline = $inline ?? true;
    }
}
