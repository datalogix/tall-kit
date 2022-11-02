<?php

namespace TALLKit\Components\Supports;

use TALLKit\Components\BladeComponent;

class PrettyPrintJson extends BladeComponent
{
    /**
     * @var mixed
     */
    public $code;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $code
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $code = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->code = json_encode((object) $code);
    }
}
