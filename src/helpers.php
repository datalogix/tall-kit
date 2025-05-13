<?php

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
        return Collection::make(value($items, ...$args))
            ->map(fn ($item, $key) => value($item, $key, ...$args))
            ->whereNotNull();
    }
}

if (! function_exists('make_model')) {
    /**
     * Make a model.
     *
     * @param  string  $class
     * @return mixed
     */
    function make_model($class)
    {
        if (class_exists($class)) {
            return app($class);
        }

        try {
            return app('\App\Models\\'.Str::of($class)->studly());
        } catch (BindingResolutionException $e) {
            //
        }

        return null;
    }
}

if (! function_exists('find_asset')) {
    /**
     * Find exists asset
     *
     * @param  string|string[]  $paths
     * @return string|null
     */
    function find_asset($paths)
    {
        foreach (array_filter(Arr::wrap($paths)) as $path) {
            if (file_exists(public_path($path))) {
                return asset($path);
            }
        }
    }
}


if (! function_exists('find_image')) {
    /**
     * Find exists image
     *
     * @param  string  $name
     * @return string|null
     */
    function find_image($name)
    {
        $paths = [
            $name.'.png',
            $name.'.jpg',
            $name.'.jpeg',
            'imgs/'.$name.'.png',
            'imgs/'.$name.'.jpg',
            'imgs/'.$name.'.jpeg',
            'images/'.$name.'.png',
            'images/'.$name.'.jpg',
            'images/'.$name.'.jpeg',
        ];

        return find_asset($paths);
    }
}
