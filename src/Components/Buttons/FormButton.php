<?php

namespace TALLKit\Components\Buttons;

use Illuminate\Support\Str;
use TALLKit\Components\Forms\Form;

class FormButton extends Form
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var bool|null
     */
    public $active;

    /**
     * @var string|bool|null
     */
    public $click;

    /**
     * @var string|bool|null
     */
    public $wireClick;

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
    public $linkText;

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
     * @var string|bool|null
     */
    public $tooltip;

    /**
     * Create a new component instance.
     *
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|bool|null  $target
     * @param  string|null  $action
     * @param  string|string[]|null  $route
     * @param  mixed  $bind
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  string|null  $text
     * @param  bool|null  $active
     * @param  string|bool|null  $click
     * @param  string|bool|null  $wireClick
     * @param  string|bool|null  $icon
     * @param  string|bool|null  $iconLeft
     * @param  string|bool|null  $iconRight
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
        $enctype = null,
        $confirm = null,
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
            $method ?? 'POST',
            $target,
            $action ?? request()->url(),
            $route,
            $bind,
            $enctype,
            $confirm,
            $theme
        );

        $this->text = $text;
        $this->active = $active;
        $this->click = $click;
        $this->wireClick = $wireClick;
        $this->icon = $icon;
        $this->iconLeft = $iconLeft;
        $this->iconRight = $iconRight;
        $this->color = $color;
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->outlined = $outlined;
        $this->linkText = $linkText;
        $this->bordered = $bordered;
        $this->loading = $loading;
        $this->preset = $preset;
        $this->tooltip = $tooltip;

        if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
            $this->method = Str::upper(data_get($presetProperties, 'method', $this->method));
            $this->confirm = $this->confirm ?? data_get($presetProperties, 'confirm');
        }
    }
}
