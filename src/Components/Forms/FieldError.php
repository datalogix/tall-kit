<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;

class FieldError extends BladeComponent
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $bag;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|null  $bag
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $bag = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->bag = $bag ?? 'default';
    }
}
