<?php

namespace TALLKit\Components\Panels;

use TALLKit\Components\BladeComponent;

class TabItem extends BladeComponent
{
    /**
     * @var string|null
     */
    public $name;

    /**
     * @var bool
     */
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  bool|null  $disabled
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $disabled = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->disabled = $disabled ?? false;
    }
}
