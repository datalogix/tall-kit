<?php

namespace TALLKit\Components\Bars;

use Illuminate\Support\Collection;
use TALLKit\Components\Menus\Nav;

class Navbar extends Nav
{
    /**
     * @var string|bool
     */
    public $breakpoint;

    /**
     * @var bool
     */
    public $animated;

    /**
     * @var string
     */
    public $align;

    /**
     * @var string|bool|null
     */
    public $logoImage;

    /**
     * @var string|bool|null
     */
    public $logoName;

    /**
     * @var string|bool|null
     */
    public $logoUrl;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $breakpointStyles;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  string|null  $breakpoint
     * @param  bool|null  $animated
     * @param  string|null  $align
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $breakpoint = null,
        $animated = null,
        $align = null,
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $theme = null
    ) {
        parent::__construct($items, true, $theme);

        $this->breakpoint = $breakpoint ?? 'none';
        $this->animated = $animated ?? true;
        $this->align = $align ?? 'between';
        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl;
        $this->breakpointStyles = Collection::make($this->themeProvider->breakpoints->get($this->breakpoint));
    }
}
