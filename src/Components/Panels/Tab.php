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
     * @param  int|bool|null  $selected
     * @param  string|null  $mode
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $selected = null,
        $mode = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->selected = $selected === false ? null : (is_null($selected) || $selected === true ? 0 : intval($selected));
        $this->mode = $mode ?? 'default';
    }
}
