<?php

namespace Datalogix\TALLKit\Components\Tables;

use Datalogix\TALLKit\Components\BladeComponent;

class Row extends BladeComponent
{
    /**
     * The row text.
     *
     * @var string
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @param  string  $text
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
    }
}
