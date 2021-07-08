<?php

namespace TALLKit\Components\Buttons;

use Illuminate\Support\Facades\Route;

class Logout extends FormButton
{
     /**
     * Create a new component instance.
     *
     * @param  string  $text
     * @param  string  $method
     * @param  string|null  $action
     * @param  array|string|null  $route
     * @param  mixed  $bind
     * @param  string|null  $enctype
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = 'Log out',
        $method = 'POST',
        $action = null,
        $route = null,
        $bind = null,
        $enctype = null,
        $theme = null
    ) {
        parent::__construct(
            $text,
            $method,
            $action ?? (Route::has('logout') ? route('logout') : (Route::has('auth.logout') ? route('auth.logout') : '/')),
            $route,
            $bind,
            $enctype,
            $theme
        );
    }
}
