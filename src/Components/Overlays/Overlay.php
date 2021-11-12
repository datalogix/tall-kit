<?php

namespace TALLKit\Components\Overlays;

use TALLKit\Components\BladeComponent;

class Overlay extends BladeComponent
{
    /**
     * @var bool
     */
    public $closeable;

    /**
     * Create a new component instance.
     *
     * @param  bool|null  $closeable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $closeable = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->closeable = $closeable ?? true;
    }
}
