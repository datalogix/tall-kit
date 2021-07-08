<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;

class Label extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $label;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $label
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($label = null, $theme = null)
    {
        parent::__construct($theme);

        $this->label = $label;
    }
}
