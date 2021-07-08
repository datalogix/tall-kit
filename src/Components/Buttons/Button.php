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
     * @var string|bool|null
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
     * @param  string  $type
     * @param  string|null  $icon
     * @param  string|null  $iconLeft
     * @param  string|null  $iconRight
     * @param  string|bool|null  $color
     * @param  bool  $outlined
     * @param  bool  $bordered
     * @param  string  $rounded
     * @param  string  $shadow
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $type = 'button',
        $icon = null,
        $iconLeft = null,
        $iconRight = null,
        $color = 'default',
        $rounded = 'default',
        $shadow = 'default',
        $outlined = false,
        $bordered = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->type = $type;
        $this->icon = $icon;
        $this->iconLeft = $iconLeft ?? $this->icon;
        $this->iconRight = $iconRight;
        $this->color = $color;
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->outlined = $outlined;
        $this->bordered = $bordered;

        if ($this->color && $colorProperties = $this->themeProvider->colors->get($this->color)) {
            $this->colorName = $colorProperties['name'] ?? $colorProperties;
            $this->colorWeight = $colorProperties['weight'] ?? 500;
            $this->colorHover = $colorProperties['hover'] ?? 700;
        }
    }
}
