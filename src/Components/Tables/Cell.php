<?php

namespace TALLKit\Components\Tables;

use TALLKit\Components\BladeComponent;

class Cell extends BladeComponent
{
    /**
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
