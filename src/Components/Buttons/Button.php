<?php

namespace TALLKit\Components\Buttons;

use Illuminate\Support\Collection;
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
     * @var string|string[]|null
     */
    public $route;

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
     * @var string|bool|array|null
     */
    public $icon;

    /**
     * @var string|bool|array|null
     */
    public $iconLeft;

    /**
     * @var string|bool|array|null
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
     * @param  string|string[]|null  $route
     * @param  string|bool|null  $target
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
     * @param  string|null  $tooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $type = null,
        $active = null,
        $href = null,
        $route = null,
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
        $this->route = $route;
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
            $this->text = $text ?? target_get($presetProperties, 'text');
            $this->active = $active ?? target_get($presetProperties, 'active');
            $this->href = $href ?? target_get($presetProperties, 'href');
            $this->target = $target ?? target_get($presetProperties, 'target');
            $this->click = $click ?? target_get($presetProperties, 'click');
            $this->wireClick = $wireClick ?? target_get($presetProperties, 'wire-click');
            $this->iconLeft = $icon ?? $iconLeft ?? target_get($presetProperties, ['icon-left', 'icon']);
            $this->iconRight = $iconRight ?? target_get($presetProperties, 'icon-right');
            $this->color = $color ?? target_get($presetProperties, 'color', 'default');
            $this->rounded = $rounded ?? target_get($presetProperties, 'rounded', 'default');
            $this->shadow = $shadow ?? target_get($presetProperties, 'shadow', 'default');
            $this->outlined = $outlined ?? target_get($presetProperties, 'outlined');
            $this->linkText = $linkText ?? target_get($presetProperties, 'link-text');
            $this->bordered = $bordered ?? target_get($presetProperties, 'bordered');
            $this->loading = $loading ?? target_get($presetProperties, 'loading');
            $this->tooltip = is_string($tooltip) ? $tooltip : ($tooltip === true ? target_get($presetProperties, 'tooltip') : false);
        }

        if ($this->color && $colorProperties = $this->themeProvider->colors->get($this->color)) {
            $this->colorName = target_get($colorProperties, 'name', $colorProperties);
            $this->colorWeight = target_get($colorProperties, 'weight', 500);
            $this->colorHover = target_get($colorProperties, 'hover', 700);
        }

        $this->href = route_detect(
            Collection::make($this->href)->union($this->route)->toArray(),
            null,
            $this->href
        );
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

        if (! $this->href) {
            return false;
        }

        return Request::fullUrlIs($this->href.'*');
    }
}
