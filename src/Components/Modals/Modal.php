<?php

namespace TALLKit\Components\Modals;

use TALLKit\Components\BladeComponent;

class Modal extends BladeComponent
{
    /**
     * @var bool
     */
    public $show;

    /**
     * @var string
     */
    public $overlay;

    /**
     * @var string
     */
    public $align;

    /**
     * Create a new component instance.
     *
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $show = false,
        $overlay = true,
        $align = 'center',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->show = $show;
        $this->overlay = $overlay;
        $this->align = $align;
    }
}
