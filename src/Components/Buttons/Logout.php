<?php

namespace TALLKit\Components\Buttons;

class Logout extends FormButton
{
     /**
     * Create a new component instance.
     *
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|null  $action
     * @param  array|string|null  $route
     * @param  mixed  $bind
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  string|null  $text
     * @param  string|bool|null  $icon
     * @param  string|bool|null  $iconLeft
     * @param  string|bool|null  $iconRight
     * @param  string|bool|null  $color
     * @param  string|bool|null  $rounded
     * @param  string|bool|null  $shadow
     * @param  bool|null  $outlined
     * @param  bool|null  $bordered
     * @param  string|bool|null  $loading
     * @param  string|null  $preset
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $init = null,
        $method = null,
        $action = null,
        $route = null,
        $bind = null,
        $enctype = null,
        $confirm = null,
        $text = null,
        $icon = null,
        $iconLeft = null,
        $iconRight = null,
        $color = null,
        $rounded = null,
        $shadow = null,
        $outlined = null,
        $bordered = null,
        $loading = null,
        $preset = null,
        $theme = null
    ) {
        parent::__construct(
            $init,
            $method,
            $action ?? route_detect(['logout', 'auth.logout']),
            $route,
            $bind,
            $enctype,
            $confirm,
            $text ?? 'Log out',
            $icon,
            $iconLeft,
            $iconRight,
            $color,
            $rounded,
            $shadow,
            $outlined,
            $bordered,
            $loading,
            $preset,
            $theme
        );
    }
}
