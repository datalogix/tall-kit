<?php

namespace Datalogix\TALLKit\Components\Buttons;

use Datalogix\TALLKit\Components\BladeComponent;

class Button extends BladeComponent
{
    /**
     * The button text.
     *
     * @var string
     */
    public $text;

    /**
     * The button type.
     *
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param  string  $text
     * @param  string  $type
     * @param  string|bool|null  $color
     * @param  bool  $outlined
     * @param  bool  $bordered
     * @param  string|bool|null  $rounded
     * @param  string|bool|null  $shadow
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $type = 'button',
        $color = 'default',
        $outlined = false,
        $bordered = false,
        $rounded = 'default',
        $shadow = 'default',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->type = $type;

        if ($color && $colorProperties = $this->themeProvider->colors->get($color)) {
            $colorName = $colorProperties['name'] ?? $colorProperties;
            $colorWeight = $colorProperties['weight'] ?? 500;
            $colorHover = $colorProperties['hover'] ?? 700;

            $this->themeProvider->button = $this->themeProvider->button->merge([
                'class' => $outlined
                    ? 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent'
                    : 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
            ], false);

            if ($bordered) {
                $this->themeProvider->button = $this->themeProvider->button->merge([
                    'class' => 'border border-'.$colorName.'-'.$colorHover,
                ], false);
            }
        }

        $this->themeProvider->button = $this->themeProvider->button
            ->merge($rounded ? $this->themeProvider->rounded->get($rounded, []) : [], false)
            ->merge($shadow ? $this->themeProvider->shadow->get($shadow, []) : [], false);
    }
}
