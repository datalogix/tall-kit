<?php

namespace TALLKit\Components\Bars;

use Illuminate\Support\Collection;
use TALLKit\Components\Navigations\Nav;

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
     * @param  string  $breakpoint
     * @param  bool  $animated
     * @param  string  $align
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $breakpoint = 'none',
        $animated = true,
        $align = 'between',
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $theme = null
    ) {
        parent::__construct($items, true, $theme);

        $this->breakpoint = $breakpoint;
        $this->animated = $animated;
        $this->align = $align;
        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl;
        $this->breakpointStyles = Collection::make($this->themeProvider->breakpoints->get($this->breakpoint));
    }
}
