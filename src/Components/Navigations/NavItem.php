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
    public $click;

    /**
     * @var string|bool|null
     */
    public $wireClick;

    /**
     * @var string|bool|null
     */
    public $icon;

    /**
     * @var string|bool|null
     */
    public $iconLeft;

    /**
     * @var string|bool|null
     */
    public $iconRight;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  bool|null  $active
     * @param  string|bool|null  $href
     * @param  string|bool|null  $target
     * @param  string|bool|null  $click
     * @param  string|bool|null  $wireClick
     * @param  string|bool|null  $icon
     * @param  string|bool|null  $iconLeft
     * @param  string|bool|null  $iconRight
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $active = null,
        $href = null,
        $target = null,
        $click = null,
        $wireClick = null,
        $icon = null,
        $iconLeft = null,
        $iconRight = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->active = $active;
        $this->href = $href;
        $this->target = $target;
        $this->click = $click;
        $this->wireClick = $wireClick;
        $this->icon = $icon;
        $this->iconLeft = $iconLeft ?? $this->icon;
        $this->iconRight = $iconRight;
    }

    /**
     * Is active item.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active ?? $this->href ? Request::fullUrlIs($this->href.'*') : false;
    }
}
