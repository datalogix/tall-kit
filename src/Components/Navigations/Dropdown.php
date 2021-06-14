<?php

namespace TALLKit\Components\Navigations;

use TALLKit\Components\BladeComponent;

class Dropdown extends BladeComponent
{
    /**
     * @var string
     */
    public $title;

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
     * @param  string  $title
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = 'Clique to open',
        $overlay = true,
        $align = 'top-left',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title;
        $this->overlay = $overlay;
        $this->align = $align;
    }
}
