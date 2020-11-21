<?php

namespace Datalogix\TALLKit\Components\Tables;

use Datalogix\TALLKit\Components\BladeComponent;

class Heading extends BladeComponent
{
    /**
     * The heading text.
     *
     * @var string
     */
    public $text;

    /**
     * The heading sortable.
     *
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
