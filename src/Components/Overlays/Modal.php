<?php

namespace TALLKit\Components\Overlays;

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
     * @param  bool|int|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|null  $transition
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $transition = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setToggleable($name, $show, $overlay, $closeable, $align);
        $this->transition = $transition ?? 'opacity';
    }
}
