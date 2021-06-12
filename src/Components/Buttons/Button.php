<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\BladeComponent;

class Button extends BladeComponent
{
    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $type;

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
     * @param  string  $text
     * @param  string  $type
     * @param  string|bool|null  $color
     * @param  bool  $outlined
     * @param  bool  $bordered
     * @param  string  $rounded
     * @param  string  $shadow
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $type = 'button',
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
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->outlined = $outlined;
        $this->bordered = $bordered;

        if ($color && $colorProperties = $this->themeProvider->colors->get($color)) {
            $this->colorName = $colorProperties['name'] ?? $colorProperties;
            $this->colorWeight = $colorProperties['weight'] ?? 500;
            $this->colorHover = $colorProperties['hover'] ?? 700;
        }
    }
}
