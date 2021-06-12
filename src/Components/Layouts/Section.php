<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Section extends BladeComponent
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @param  string  $subtitle
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = '',
        $subtitle = '',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title;
        $this->subtitle = $subtitle;
    }
}
