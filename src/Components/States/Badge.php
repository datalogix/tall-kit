<?php

namespace TALLKit\Components\States;

use TALLKit\Components\BladeComponent;

class Badge extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string|bool
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param  strin|null  $text
     * @param  string|bool|null  $type
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $type = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->type = $type ?? 'default';
    }
}
