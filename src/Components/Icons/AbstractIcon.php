<?php

namespace TALLKit\Components\Icons;

use TALLKit\Components\BladeComponent;

abstract class AbstractIcon extends BladeComponent
{
    /**
     * @var string|null
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $icon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $icon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name ?? $icon;
    }
}
