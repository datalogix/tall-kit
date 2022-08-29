<?php

namespace TALLKit\Components\Icons;

use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;

class Fortawesome extends BladeComponent
{
    /**
     * @var string|null
     */
    public $icon;

    /**
     * @var string
     */
    public $iconStyle;

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
        $icon = null,
        $name = null,
        $solid = null,
        $regular = null,
        $light = null,
        $thin = null,
        $duotone = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->icon = Str::replaceFirst('fa-', '', $icon ?? $name);
        $this->iconStyle = 'solid';

        if ($solid) {
            $this->iconStyle = 'solid';
        }

        if ($regular) {
            $this->iconStyle = 'regular';
        }

        if ($light) {
            $this->iconStyle = 'light';
        }

        if ($thin) {
            $this->iconStyle = 'thin';
        }

        if ($duotone) {
            $this->iconStyle = 'duotone';
        }
    }
}
