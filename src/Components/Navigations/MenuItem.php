<?php

namespace Datalogix\TALLKit\Components\Navigations;

use Datalogix\TALLKit\Components\BladeComponent;

class MenuItem extends BladeComponent
{
    /**
     * The menu item text.
     *
     * @var string
     */
    public $text;

    /**
     * The menu item href.
     *
     * @var string|bool
     */
    public $href;

    /**
     * The menu item icon left.
     *
     * @var string|bool
     */
    public $iconLeft;

    /**
     * The menu item icon right.
     *
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
