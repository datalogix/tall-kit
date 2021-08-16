<?php

namespace TALLKit\Components\Navigations;

use Illuminate\Support\Facades\Request;
use TALLKit\Components\BladeComponent;

class NavItem extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var bool|null
     */
    public $active;

    /**
     * @var string|bool
     */
    public $href;

    /**
     * @var string|bool
     */
    public $target;

    /**
     * @var string|bool
     */
    public $click;

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
     * @param  string|null  $text
     * @param  bool|null  $active
     * @param  string|bool  $href
     * @param  string|bool  $target
     * @param  string|bool  $click
     * @param  string|bool  $iconLeft
     * @param  string|bool  $iconRight
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $active = null,
        $href = false,
        $target = false,
        $click = false,
        $iconLeft = false,
        $iconRight = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->active = $active;
        $this->href = $href;
        $this->target = $target;
        $this->click = $click;
        $this->iconLeft = $iconLeft;
        $this->iconRight = $iconRight;
    }

    /**
     * Is active item.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active ?? $this->href ? Request::is($this->href) : false;
    }
}
