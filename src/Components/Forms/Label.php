<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;

class Label extends BladeComponent
{
    /**
     * The label text.
     *
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
    public function __construct($label = '', $theme = null)
    {
        parent::__construct($theme);

        $this->label = $label;
    }
}
