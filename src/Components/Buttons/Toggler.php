<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\BladeComponent;

class Toggler extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $icon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $icon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->icon = $icon;
    }
}
