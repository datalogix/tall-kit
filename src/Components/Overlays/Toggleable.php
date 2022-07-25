<?php

namespace TALLKit\Components\Overlays;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\Toggleable as ConcernsToggleable;

class Toggleable extends BladeComponent
{
    use ConcernsToggleable;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $name
     * @param  bool|int|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setToggleable($name, $show, $overlay, $closeable, $align);
    }
}
