<?php

namespace TALLKit\Components;

use Illuminate\Support\Collection;
use Illuminate\View\ComponentAttributeBag;
use TALLKit\Binders\ThemeBinder;

class ThemeProvider
{
    /**
     * The themes.
     *
     * @var array
     */
    protected $themes;

    /**
     * The items of theme on component.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $items;

    /**
     * Create a new theme provider instance.
     *
     * @param  array  $themes
     * @return void
     */
    public function __construct(array $themes)
    {
        $this->themes = $themes;
        $this->items = Collection::make();
    }

    /**
     * Create a new theme provider instance.
     *
     * @param  string|null  $name
     * @param  string  $component
     * @return \TALLKit\Components\ThemeProvider
     */
    public function make($name, $component)
    {
        $name = $name ?: app(ThemeBinder::class)->get();
        $theme = $this->themes[$name] ?? $this->themes['default'];

        $this->items = $this->items->wrap($theme[$component] ?? []);

        return $this;
    }

    /**
     * Get an item from the collection by key.
     *
     * @param  mixed  $key
     * @return \Illuminate\View\ComponentAttributeBag
     */
    public function __get($key)
    {
        $value = $this->items->get($key, []);
        $attributes = is_array($value) ? $value : ['class' => $value];

        return new ComponentAttributeBag($attributes);
    }
}
