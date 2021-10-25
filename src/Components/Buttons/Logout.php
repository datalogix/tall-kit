<?php

namespace TALLKit\Components\Buttons;

class Logout extends FormButton
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $method
     * @param  string|null  $action
     * @param  array|string|null  $route
     * @param  mixed  $bind
     * @param  string|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  string|null  $text
     * @param  string|null  $icon
     * @param  string|null  $iconLeft
     * @param  string|null  $iconRight
     * @param  string|bool|null  $color
     * @param  string|null  $rounded
     * @param  string|null  $shadow
     * @param  bool|null  $outlined
     * @param  bool|null  $bordered
     * @param  string|null  $preset
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
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
        $preset = null,
        $theme = null
    ) {
        parent::__construct(
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
            $preset,
            $theme
        );
    }
}
