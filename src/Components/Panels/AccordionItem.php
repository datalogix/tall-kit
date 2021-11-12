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
     * @param  bool|int|null  $open
     * @param  bool|null  $disabled
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $open = null,
        $disabled = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->open = $open ?? false;
        $this->disabled = $disabled ?? false;
    }
}
