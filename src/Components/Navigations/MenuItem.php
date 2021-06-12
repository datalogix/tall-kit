<?php

namespace TALLKit\Components\Navigations;

use TALLKit\Components\BladeComponent;

class MenuItem extends BladeComponent
{
    /**
     * @var string
     */
    public $text;

    /**
     * @var string|bool
     */
    public $href;

    /**
     * @var string|bool
     */
    public $iconLeft;

    /**
     * @var string|bool
     */
    public $iconRight;

    /**
     * Create a new component instance.
     *
     * @param  string  $text
     * @param  string|bool  $href
     * @param  string|bool  $iconLeft
     * @param  string|bool  $iconRight
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $href = false,
        $iconLeft = false,
        $iconRight = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->href = $href;
        $this->iconLeft = $iconLeft;
        $this->iconRight = $iconRight;
    }
}
