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
     * @var string|null
     */
    public $icon;

    /**
     * @var string|null
     */
    public $iconLeft;

    /**
     * @var string|null
     */
    public $iconRight;

    /**
     * @var string|bool|null
     */
    public $color;

    /**
     * @var string|null
     */
    public $rounded;

    /**
     * @var string|null
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
     * @var string|null
     */
    public $preset;

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
        $this->preset = $preset;

        if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
            $this->method = strtoupper($presetProperties['method']) ?? $this->method;
            $this->confirm = $this->confirm ?? $presetProperties['confirm'];
        }
    }
}
