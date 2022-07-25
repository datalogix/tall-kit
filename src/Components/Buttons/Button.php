<?php

namespace TALLKit\Components\Buttons;

use Illuminate\Support\Facades\Request;
use TALLKit\Components\BladeComponent;

class Button extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string|bool|null
     */
    public $type;

    /**
     * @var bool|null
     */
    public $active;

    /**
     * @var string|bool|null
     */
    public $href;

    /**
     * @var string|bool|null
     */
    public $target;

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
    public $linkText;

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
     * @param  string|bool|null  $type
     * @param  bool|null  $active
     * @param  string|bool|null  $href
     * @param  string|bool|null  $target
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
     * @param  string|null  $tooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $type = null,
        $active = null,
        $href = null,
        $target = null,
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
        parent::__construct($theme);

        $this->text = $text;
        $this->type = $type ?? 'button';
        $this->active = $active;
        $this->href = $href;
        $this->target = $target;
        $this->click = $click;
        $this->wireClick = $wireClick;
        $this->icon = $icon;
        $this->iconLeft = $iconLeft ?? $this->icon;
        $this->iconRight = $iconRight;
        $this->color = $color ?? 'default';
        $this->rounded = $rounded ?? 'default';
        $this->shadow = $shadow ?? 'default';
        $this->outlined = $outlined;
        $this->linkText = $linkText;
        $this->bordered = $bordered;
        $this->loading = $loading;
        $this->preset = $preset;
        $this->tooltip = $tooltip;

        if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
            $this->text = $text ?? data_get($presetProperties, 'text');
            $this->active = $active ?? data_get($presetProperties, 'active');
            $this->href = $href ?? data_get($presetProperties, 'href');
            $this->target = $target ?? data_get($presetProperties, 'target');
            $this->click = $click ?? data_get($presetProperties, 'click');
            $this->wireClick = $wireClick ?? data_get($presetProperties, 'wire-click');
            $this->iconLeft = $iconLeft ?? data_get($presetProperties, 'icon-left', data_get($presetProperties, 'icon'));
            $this->iconRight = $iconRight ?? data_get($presetProperties, 'icon-right');
            $this->color = $color ?? data_get($presetProperties, 'color', 'default');
            $this->rounded = $rounded ?? data_get($presetProperties, 'rounded', 'default');
            $this->shadow = $shadow ?? data_get($presetProperties, 'shadow', 'default');
            $this->outlined = $outlined ?? data_get($presetProperties, 'outlined');
            $this->linkText = $linkText ?? data_get($presetProperties, 'link-text');
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

    /**
     * Is active item.
     *
     * @return bool
     */
    public function isActive()
    {
        if ($this->active) {
            return true;
        }

        if (!$this->href) {
            return false;
        }

        return Request::fullUrlIs($this->href.'*');
    }
}
