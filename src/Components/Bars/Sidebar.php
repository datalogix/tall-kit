<?php

namespace TALLKit\Components\Bars;

use Illuminate\Support\Collection;
use TALLKit\Components\Overlays\Drawer;

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
     * @var string|null
     */
    public $target;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $items
     * @param  string|bool|null  $breakpoint
     * @param  string|bool|null  $name
     * @param  bool|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|null  $target
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $breakpoint = null,
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $target = null,
        $theme = null
    ) {
        parent::__construct(
            $name ?? 'sidebar',
            $show,
            $overlay,
            $closeable,
            $align,
            $theme
        );

        $this->items = Collection::make($items)->filter();
        $this->breakpoint = $breakpoint ?? 'none';
        $this->target = $target;
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
            ->merge(['theme:overlay' => $this->themeProvider->overlays->get($this->breakpoint, [])], false)
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
            ->merge($this->target ? ['target' => $this->target] : [])
            ->getAttributes();
    }
}
