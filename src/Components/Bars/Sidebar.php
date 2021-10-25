<?php

namespace TALLKit\Components\Bars;

use Illuminate\Support\Collection;
use TALLKit\Components\Navigations\Drawer;

class Sidebar extends Drawer
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $items;

    /**
     * @var string|bool
     */
    public $breakpoint;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  string|bool|null  $breakpoint
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $breakpoint = 'none',
        $name = 'sidebar',
        $show = false,
        $overlay = true,
        $align = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $show,
            $overlay,
            $align,
            $theme
        );

        $this->items = Collection::make($items);
        $this->breakpoint = $breakpoint;
    }

    /**
     * Get container.
     *
     * @return array
     */
    public function container()
    {
        return $this->attributes
            ->mergeOnlyThemeProvider($this->themeProvider, 'container')
            ->merge(['x-init' => 'setup(\''.$this->name.'\', \''.$this->breakpoint.'\')'], false)
            ->merge(['theme:overlay' => $this->themeProvider->overlay->get($this->breakpoint, [])], false)
            ->getAttributes();
    }

    /**
     * Get item.
     *
     * @return array
     */
    public function item()
    {
        return $this->attributes
            ->mergeOnlyThemeProvider($this->themeProvider, 'item')
            ->merge([
                'theme:item.except.class' => true,
                'theme:active.except.class' => true,
                'theme:active' => $this->attributes
                    ->mergeOnlyThemeProvider($this->themeProvider, 'active')
                    ->get('class'),
            ])
            ->getAttributes();
    }
}
