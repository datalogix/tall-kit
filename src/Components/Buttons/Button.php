<?php

namespace Datalogix\TALLKit\Components\Buttons;

use Datalogix\TALLKit\Components\BladeComponent;
use Datalogix\TALLKit\Components\ComponentAttributeBag;

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
     * The button attrs.
     *
     * @var \Datalogix\TALLKit\Components\ComponentAttributeBag
     */
    public $attrs;

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
        $this->attrs = new ComponentAttributeBag($this->themeProvider->button->toArray());

        if ($color && $colorProperties = $this->themeProvider->colors->get($color)) {
            $colorName = $colorProperties['name'] ?? $colorProperties;
            $colorWeight = $colorProperties['weight'] ?? 500;
            $colorHover = $colorProperties['hover'] ?? 700;

            $this->attrs = $this->attrs->merge([
                'class' => $outlined
                    ? 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent'
                    : 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
            ]);

            if ($bordered) {
                $this->attrs = $this->attrs->merge([
                    'class' => 'border border-'.$colorName.'-'.$colorHover,
                ]);
            }
        }

        if ($rounded) {
            $this->attrs = $this->attrs->merge(
                $this->themeProvider->rounded->get($rounded, [])
            );
        }

        if ($shadow) {
            $this->attrs = $this->attrs->merge(
                $this->themeProvider->shadow->get($shadow, [])
            );
        }
    }
}
