<?php

namespace TALLKit\Components\Icons;

use TALLKit\Components\BladeComponent;

class Iconify extends BladeComponent
{
    /**
     * @var string|null
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $icon
     * @param  string|null  $name
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $icon = null,
        $name = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->icon = $icon ?? $name;
    }
}
