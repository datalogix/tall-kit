<?php

namespace TALLKit\Components\Overlays;

use TALLKit\Components\Navigations\Toggleable;

class Modal extends Toggleable
{
    protected static $ALIGN_DEFAULT = 'center';

    /**
     * @var string
     */
    public $transition;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string  $transition
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $show = false,
        $overlay = true,
        $align = null,
        $transition = 'opacity',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setToggleable($name, $show, $overlay, $align);
        $this->transition = $transition;
    }
}
