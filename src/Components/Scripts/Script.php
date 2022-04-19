<?php

namespace TALLKit\Components\Scripts;

use TALLKit\Components\BladeComponent;

class Script extends BladeComponent
{
    /**
     * @var bool
     */
    public $noscript;

    /**
     * Create a new component instance.
     *
     * @param  bool|null  $noscript
     * @return void
     */
    public function __construct($noscript = null)
    {
        parent::__construct(null);

        $this->noscript = $noscript ?? false;
    }
}
