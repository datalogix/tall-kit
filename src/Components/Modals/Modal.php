<?php

namespace Datalogix\TALLKit\Components\Modals;

use Datalogix\TALLKit\Components\BladeComponent;

class Modal extends BladeComponent
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
    ];

    /**
     * The modal align.
     *
     * @var string
     */
    public $align;

    /**
     * Create a new component instance.
     *
     * @param  string  $align
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $align = 'top',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->align = $align;
    }
}
