<?php

namespace TALLKit\Components\Bars;

use TALLKit\Components\Navigations\Drawer;

class Sidebar extends Drawer
{
    /**
     * @var array
     */
    public $items;

    /**
     * @var string|bool
     */
    public $breakpoint;

    /**
     * Create a new component instance.
     *
     * @param  array  $items
     * @param  string|bool|null  $breakpoint
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = [],
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

        $this->items = $items;
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
            ->merge($this->breakpoint ? ['theme:overlay' => $this->breakpoint.':hidden'] : [], false)
            ->getAttributes();
    }

    /**
     * Get breakpoint classes.
     *
     * @return array
     */
    public function breakpointClasses()
    {
        return $this->breakpoint
            ? [':class' => '{ \''.$this->breakpoint.':static\': isOpened() }']
            : [];
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
