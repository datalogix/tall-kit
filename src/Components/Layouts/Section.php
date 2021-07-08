<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Section extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $title;

    /**
     * @var string|bool|null
     */
    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $title
     * @param  string|bool|null  $subtitle
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $subtitle = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title;
        $this->subtitle = $subtitle;
    }
}
