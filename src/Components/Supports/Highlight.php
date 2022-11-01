<?php

namespace TALLKit\Components\Supports;

use TALLKit\Components\BladeComponent;

class Highlight extends BladeComponent
{
    /**
     * @var string|null
     */
    public $code;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $code
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $code = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->code = $code;
    }
}
