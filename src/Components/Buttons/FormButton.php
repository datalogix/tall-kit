<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\Forms\Form;

class FormButton extends Form
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string|bool|null
     */
    public $icon;

    /**
     * @var string|bool|null
     */
    public $iconLeft;

    /**
     * @var string|bool|null
     */
    public $iconRight;

    /**
     * @var string|bool|null
     */
    public $color;

    /**
     * @var string|bool|null
     */
    public $rounded;

    /**
     * @var string|bool|null
     */
    public $shadow;

    /**
     * @var bool|null
     */
    public $outlined;

    /**
     * @var bool|null
     */
    public $bordered;

    /**
     * @var bool|null
     */
    public $loading;

    /**
     * @var string|null
     */
    public $preset;

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
            $method ?? 'POST',
            $action ?? request()->url(),
            $route,
            $bind,
            $enctype,
            $confirm,
            $theme
        );

        $this->text = $text;
        $this->icon = $icon;
        $this->iconLeft = $iconLeft;
        $this->iconRight = $iconRight;
        $this->color = $color;
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->outlined = $outlined;
        $this->bordered = $bordered;
        $this->loading = $loading;
        $this->preset = $preset;

        if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
            $this->method = strtoupper($presetProperties['method']) ?? $this->method;
            $this->confirm = $this->confirm ?? $presetProperties['confirm'];
        }
    }
}
