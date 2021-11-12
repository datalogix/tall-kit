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
     * @param  mixed  $items
     * @param  bool|null  $inline
     * @param  string|bool|null  $name
     * @param  bool|int|null  $show
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|bool|null  $iconName
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $items = null,
        $inline = null,
        $name = null,
        $show = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $iconName = null,
        $theme = null
    ) {
        parent::__construct(
            $items,
            $inline ?? false,
            $theme
        );

        $this->setToggleable($name, $show, $overlay, $closeable, $align);
        $this->iconName = $iconName;
    }
}
