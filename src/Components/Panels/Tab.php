<?php

namespace TALLKit\Components\Panels;

use TALLKit\Components\BladeComponent;

class Tab extends BladeComponent
{
    /**
     * @var int|null
     */
    public $selected;

    /**
     * @var string
     */
    public $mode;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $selected
     * @param  string|bool|null  $mode
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $selected = 0,
        $mode = 'default',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->selected = is_null($selected) || $selected === false ? null : ($selected === true ? 0 : intval($selected));
        $this->mode = $mode ?: 'none';
    }
}
