<?php

namespace TALLKit\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\ComponentAttributeBag;

class ThemeProvider
{
    /**
     * The theme name by route.
     *
     * @var string|null
     */
    protected static $themeByRoute;

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
     * @return void
     */
    public function __construct(array $themes = [])
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
        $default = target_get($this->themes, 'default');
        $theme = target_get($this->themes, $name);
        $item = target_get($theme, $component, target_get($default, $component, []));

        $this->items = $this->items->wrap($item);

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

    /**
     * Get the theme name by route.
     *
     * @return string
     */
    public static function getThemeByRoute()
    {
        if (static::$themeByRoute) {
            return static::$themeByRoute;
        }

        $themesByRoute = config('tallkit.options.themes_by_route', []);

        foreach ($themesByRoute as $theme => $patterns) {
            if (Route::is($patterns)) {
                return static::$themeByRoute = $theme;
            }
        }

        return static::$themeByRoute = 'default';
    }
}
