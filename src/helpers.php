<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

if (! function_exists('route_detect')) {
    /**
     * Detect any routes exists or return default.
     *
     * @param  string|string[]  $routes
     * @param  mixed  $parameters
     * @param  string  $default
     * @return string
     */
    function route_detect($routes, $parameters = null, $default = '/')
    {
        foreach (array_filter(Arr::wrap($routes)) as $route) {
            if (Route::has($route)) {
                return route($route, $parameters);
            }
        }

        return $default;
    }
}

if (! function_exists('target_get')) {
    /**
     * Get an item from an array or object using keys
     * and return the default value of the given value.
     *
     * @param  mixed  $target
     * @param  string|array|int|null  $keys
     * @param  mixed  $default
     * @return mixed
     */
    function target_get($target, $keys = null, $default = null, ...$args)
    {
        $target = value($target, $keys, $default, ...$args);

        foreach (array_filter(Arr::wrap($keys)) as $key) {
            if ($key instanceof Closure) {
                return value($key, $target, $default, ...$args);
            }

            $value = value(data_get($target, $key));

            if (! is_null($value)) {
                return $value;
            }
        }

        return $default;
    }
}

if (! function_exists('collect_value')) {
    /**
     * Create a collection from the given value
     * and return the default value of every item.
     *
     * @param  mixed  $items
     * @return \Illuminate\Support\Collection
     */
    function collect_value($items = null, ...$args)
    {
        return Collection::make(value($items, ...$args))->map(function ($item, $key) use ($args) {
            return value($item, $key, ...$args);
        })->filter();
    }
}
