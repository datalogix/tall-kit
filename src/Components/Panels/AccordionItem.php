<?php

namespace TALLKit\Components\Panels;

use TALLKit\Components\BladeComponent;

class AccordionItem extends BladeComponent
{
    /**
     * @var string|null
     */
    public $name;

    /**
     * @var bool|int
     */
    public $open;

    /**
     * @var bool
     */
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  bool|int  $open
     * @param  bool  $disabled
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $open = false,
        $disabled = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->open = $open;
        $this->disabled = $disabled;
    }
}
