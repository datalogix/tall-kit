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
     * @var string|bool|null
     */
    public $tooltip;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $icon
     * @param  string|bool|null  $tooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $icon = null,
        $tooltip = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->icon = $icon;
        $this->tooltip = $tooltip;
    }
}
