<?php

namespace Datalogix\TALLKit\Components;

use Datalogix\TALLKit\ThemeBinder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

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
    }

    /**
     * Create a new theme provider instance.
     *
     * @param  string|null  $name
     * @param  string  $component
     * @return \Datalogix\TALLKit\Components\ThemeProvider
     */
    public function make($name, $component)
    {
        $name = $name ?: app(ThemeBinder::class)->get();
        $theme = $this->themes[$name] ?? $this->themes['default'];
        $component = Str::kebab($component);

        $this->items = Collection::make($theme[$component] ?? []);

        return $this;
    }

    /**
     * Get an item from the collection by key.
     *
     * @param  mixed  $key
     * @return \Illuminate\View\ComponentAttributeBag|string|mixed
     */
    public function __get($key)
    {
        $value = $this->items->get($key, []);

        return is_array($value)
            ? new ComponentAttributeBag($value)
            : $value;
    }
}
