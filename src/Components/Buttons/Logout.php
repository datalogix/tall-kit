<?php

namespace Datalogix\TALLKit\Components\Buttons;

use Illuminate\Support\Facades\Route;

class Logout extends FormButton
{
     /**
     * Create a new component instance.
     *
     * @param  string  $text
     * @param  string  $method
     * @param  string|null  $action
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = 'Log out',
        $method = 'POST',
        $action = null,
        $theme = null
    ) {
        parent::__construct(
            $text,
            $method,
            $action ?? Route::has('logout') ? route('logout') : route('auth.logout'),
            $theme
        );
    }
}
