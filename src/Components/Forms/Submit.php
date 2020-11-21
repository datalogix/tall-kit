<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;

class Submit extends BladeComponent
{
    public $color;
    public $outlined;
    public $bordered;
    public $rounded;
    public $shadow;
    public $theme;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $color
     * @param  bool  $outlined
     * @param  bool  $bordered
     * @param  string|bool|null  $rounded
     * @param  string|bool|null  $shadow
     * @param  string|null  $theme
     * @return void
     */
   public function __construct(
        $color = 'info',
        $outlined = false,
        $bordered = false,
        $rounded = 'default',
        $shadow = 'default',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->color = $color;
        $this->outlined = $outlined;
        $this->bordered = $bordered;
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->theme = $theme;
    }
}
