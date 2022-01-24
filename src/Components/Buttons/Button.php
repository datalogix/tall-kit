<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\BladeComponent;

class Button extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string|null
     */
    public $href;

    /**
     * @var string
     */
    public $type;

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
     * @var string|null
     */
    public $colorName;

    /**
     * @var int|null
     */
    public $colorWeight;

    /**
     * @var int|null
     */
    public $colorHover;

    /**
     * @var string|bool
     */
    public $rounded;

    /**
     * @var string|bool
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
     * @var string|bool|null
     */
    public $loading;

    /**
     * @var string|null
     */
    public $preset;

    /**
     * @var string|bool
     */
    public $color;

    /**
     * @var string|bool|null
     */
    public $tooltip;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|null  $href
     * @param  string|null  $type
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
     * @param  string|null  $tooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $href = null,
        $type = null,
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
        $tooltip = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->href = $href;
        $this->type = $type ?? 'button';
        $this->icon = $icon;
        $this->iconLeft = $iconLeft ?? $this->icon;
        $this->iconRight = $iconRight;
        $this->color = $color ?? 'default';
        $this->rounded = $rounded ?? 'default';
        $this->shadow = $shadow ?? 'default';
        $this->outlined = $outlined;
        $this->bordered = $bordered;
        $this->loading = $loading;
        $this->preset = $preset;
        $this->tooltip = $tooltip;

        if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
            $this->text = $text ?? data_get($presetProperties, 'text');
            $this->iconLeft = $iconLeft ?? data_get($presetProperties, 'icon-left', data_get($presetProperties, 'icon'));
            $this->iconRight = $iconRight ?? data_get($presetProperties, 'icon-right');
            $this->color = $color ?? data_get($presetProperties, 'color', 'default');
            $this->rounded = $rounded ?? data_get($presetProperties, 'rounded', 'default');
            $this->shadow = $shadow ?? data_get($presetProperties, 'shadow', 'default');
            $this->outlined = $outlined ?? data_get($presetProperties, 'outlined');
            $this->bordered = $bordered ?? data_get($presetProperties, 'bordered');
            $this->loading = $loading ?? data_get($presetProperties, 'loading');
            $this->tooltip = is_string($tooltip) ? $tooltip : ($tooltip === true ? data_get($presetProperties, 'tooltip') : false);
        }

        if ($this->color && $colorProperties = $this->themeProvider->colors->get($this->color)) {
            $this->colorName = data_get($colorProperties, 'name', $colorProperties);
            $this->colorWeight = data_get($colorProperties, 'weight', 500);
            $this->colorHover = data_get($colorProperties, 'hover', 700);
        }
    }
}
