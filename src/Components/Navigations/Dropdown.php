<?php

namespace Datalogix\TALLKit\Components\Navigations;

use Datalogix\TALLKit\Components\BladeComponent;

class Dropdown extends BladeComponent
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
    ];

    /**
     * Create a new component instance.
     *
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $align = 'right',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->themeProvider->dropdown = $this->themeProvider->dropdown
            ->merge($this->themeProvider->align->get($align, []), false);
    }
}
