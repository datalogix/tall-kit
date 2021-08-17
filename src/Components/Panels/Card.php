<?php

namespace TALLKit\Components\Panels;

use TALLKit\Components\BladeComponent;

class Card extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $title;

    /**
     * @var string|bool|null
     */
    public $text;

    /**
     * @var string|bool|null
     */
    public $href;

    /**
     * @var string|bool|null
     */
    public $target;

    /**
     * @var string|bool|null
     */
    public $imageHeader;

    /**
     * @var string|bool|null
     */
    public $imageFooter;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $title
     * @param  string|bool|null  $text
     * @param  string|bool|null  $href
     * @param  string|bool|null  $target
     * @param  string|bool|null  $imageHeader
     * @param  string|bool|null  $imageFooter
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $text = null,
        $href = null,
        $target = null,
        $imageHeader = null,
        $imageFooter = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title;
        $this->text = $text;
        $this->href = $href;
        $this->target = $target;
        $this->imageHeader = $imageHeader;
        $this->imageFooter = $imageFooter;
    }
}
