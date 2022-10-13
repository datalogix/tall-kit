<?php

namespace TALLKit\Components\Buttons;

class Logout extends FormButton
{
    /**
     * Create a new component instance.
     *
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|bool|null  $target
     * @param  string|null  $action
     * @param  string|string[]|null  $route
     * @param  mixed  $bind
     * @param  string|bool|null  $modelable
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  mixed  $fields
     * @param  string|null  $text
     * @param  bool|null  $active
     * @param  string|bool|null  $click
     * @param  string|bool|null  $wireClick
     * @param  string|bool|array|null  $icon
     * @param  string|bool|array|null  $iconLeft
     * @param  string|bool|array|null  $iconRight
     * @param  string|bool|null  $color
     * @param  string|bool|null  $rounded
     * @param  string|bool|null  $shadow
     * @param  bool|null  $outlined
     * @param  bool|null  $linkText
     * @param  bool|null  $bordered
     * @param  string|bool|null  $loading
     * @param  string|null  $preset
     * @param  string|bool|null  $tooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $init = null,
        $method = null,
        $target = null,
        $action = null,
        $route = null,
        $bind = null,
        $modelable = null,
        $enctype = null,
        $confirm = null,
        $fields = null,
        $text = null,
        $active = null,
        $click = null,
        $wireClick = null,
        $icon = null,
        $iconLeft = null,
        $iconRight = null,
        $color = null,
        $rounded = null,
        $shadow = null,
        $outlined = null,
        $linkText = null,
        $bordered = null,
        $loading = null,
        $preset = null,
        $tooltip = null,
        $theme = null
    ) {
        parent::__construct(
            $init,
            $method,
            $target,
            $action ?? route_detect(['logout', 'auth.logout']),
            $route,
            $bind,
            $modelable,
            $enctype,
            $confirm,
            $fields,
            $text ?? 'Log out',
            $active,
            $click,
            $wireClick,
            $icon,
            $iconLeft,
            $iconRight,
            $color,
            $rounded,
            $shadow,
            $outlined,
            $linkText,
            $bordered,
            $loading,
            $preset,
            $tooltip,
            $theme,
        );
    }
}
