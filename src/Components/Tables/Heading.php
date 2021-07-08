<?php

namespace TALLKit\Components\Tables;

use TALLKit\Components\BladeComponent;

class Heading extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string|bool
     */
    public $sortable;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|bool  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $sortable = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->sortable = $sortable ? strtolower($sortable === true ? 'asc' : $sortable) : false;
    }
}
