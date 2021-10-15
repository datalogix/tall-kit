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
     * @var string
     */
    public $align;

    /**
     * @var string|bool
     */
    public $sortable;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|bool|null  $align
     * @param  string|bool  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $align = null,
        $sortable = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->align = $align ?: 'left';
        $this->sortable = $sortable ? strtolower($sortable === true ? 'asc' : $sortable) : false;
    }
}
