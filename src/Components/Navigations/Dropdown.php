<?php

namespace TALLKit\Components\Navigations;

use TALLKit\Components\BladeComponent;

class Dropdown extends BladeComponent
{
    /**
     * @var bool
     */
    public $overlay;

    /**
     * @var string
     */
    public $align;

    /**
     * Create a new component instance.
     *
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $overlay = true,
        $align = 'top-left',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->overlay = $overlay;
        $this->align = $align;
    }
}
