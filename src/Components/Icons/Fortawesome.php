<?php

namespace TALLKit\Components\Icons;

class Fortawesome extends AbstractIcon
{
    /**
     * @var string
     */
    public $style;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $icon
     * @param  string|null  $name
     * @param  bool|null  $solid
     * @param  bool|null  $regular
     * @param  bool|null  $light
     * @param  bool|null  $thin
     * @param  bool|null  $duotone
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $icon = null,
        $solid = null,
        $regular = null,
        $light = null,
        $thin = null,
        $duotone = null,
        $theme = null
    ) {
        parent::__construct($name, $icon, $theme);

        $this->style = 'solid';

        if ($solid) {
            $this->style = 'solid';
        }

        if ($regular) {
            $this->style = 'regular';
        }

        if ($light) {
            $this->style = 'light';
        }

        if ($thin) {
            $this->style = 'thin';
        }

        if ($duotone) {
            $this->style = 'duotone';
        }
    }
}
