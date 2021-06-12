<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;

class ValidationErrors extends BladeComponent
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string
     */
    public $bag;

    /**
     * Create a new component instance.
     *
     * @param  string  $type
     * @param  string|null  $title
     * @param  string  $bag
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $type = 'danger',
        $title = null,
        $bag = 'default',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->type = $type;
        $this->title = $title;
        $this->bag = $bag;
    }
}
