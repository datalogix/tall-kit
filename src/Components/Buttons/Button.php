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
     * @var string
     */
    public $rounded;

    /**
     * @var string
     */
    public $shadow;

    /**
     * @var bool
     */
    public $outlined;

    /**
     * @var bool
     */
    public $bordered;

    /**
     * @var string|null
     */
    public $preset;

    /**
     * @var string|bool
     */
    public $color;

    /**
     * @var string
     */
    public $colorName;

    /**
     * @var int
     */
    public $colorWeight;

    /**
     * @var int
     */
    public $colorHover;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|null  $href
     * @param  string|null  $type
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
        $preset = null,
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
        $this->outlined = $outlined ?? false;
        $this->bordered = $bordered ?? false;
        $this->preset = $preset;

        if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
            $this->text = $text ?? $presetProperties['text'];
            $this->icon = $icon ?? $presetProperties['icon'] ?? null;
            $this->iconLeft = $iconLeft ?? $presetProperties['iconLeft'] ?? $this->icon;
            $this->iconRight = $iconRight ?? $presetProperties['iconRight'] ?? null;
            $this->color = $color ?? $presetProperties['color'] ?? 'default';
            $this->rounded = $rounded ?? $presetProperties['rounded'] ?? 'default';
            $this->shadow = $shadow ?? $presetProperties['shadow'] ?? 'default';
            $this->outlined = $outlined ?? $presetProperties['outlined'] ?? false;
            $this->bordered = $bordered ?? $presetProperties['bordered'] ?? false;
        }

        if ($this->color && $colorProperties = $this->themeProvider->colors->get($this->color)) {
            $this->colorName = $colorProperties['name'] ?? $colorProperties;
            $this->colorWeight = $colorProperties['weight'] ?? 500;
            $this->colorHover = $colorProperties['hover'] ?? 700;
        }
    }
}
