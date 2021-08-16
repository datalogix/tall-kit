<?php

namespace TALLKit\Components\Menus;

use TALLKit\Concerns\Toggleable;

class MenuDropdown extends Menu
{
    use Toggleable;

    /**
     * @var string|bool|null
     */
    public $iconName;

    /**
     * Create a new component instance.
     *
     * @param  array  $items
     * @param  bool  $inline
     * @param  string|bool|null  $name
     * @param  bool  $show
     * @param  bool  $overlay
     * @param  string|null  $align
     * @param  string|bool|null  $iconName
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = [],
        $inline = false,
        $name = null,
        $show = false,
        $overlay = true,
        $align = null,
        $iconName = null,
        $theme = null
    ) {
        parent::__construct(
            $items,
            $inline,
            $theme
        );

        $this->setToggleable($name, $show, $overlay, $align);
        $this->iconName = $iconName;
    }
}
