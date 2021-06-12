<?php

namespace TALLKit\Components\Tables;

use TALLKit\Components\BladeComponent;

class Heading extends BladeComponent
{
    /**
     * @var string
     */
    public $text;

    /**
     * @var string|bool
     */
    public $sortable;

    /**
     * Create a new component instance.
     *
     * @param  string  $text
     * @param  string|bool  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $sortable = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->sortable = $sortable ? strtolower($sortable === true ? 'asc' : $sortable) : false;
    }
}
