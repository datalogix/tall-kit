<?php

namespace TALLKit\Components\Navigations;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\Toggleable as ConcernsToggleable;

class Toggleable extends BladeComponent
{
    use ConcernsToggleable;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $name
     * @param  bool|int  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $show = false,
        $overlay = true,
        $align = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setToggleable($name, $show, $overlay, $align);
    }
}
