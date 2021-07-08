<?php

namespace TALLKit\Components\Tables;

use TALLKit\Components\BladeComponent;

class Row extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
    }
}
