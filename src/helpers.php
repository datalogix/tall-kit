<?php

use Illuminate\Support\Arr;
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
        foreach (Arr::wrap($routes) as $route) {
            if (Route::has($route)) {
                return route($route, $parameters);
            }
        }

        return $default;
    }
}
