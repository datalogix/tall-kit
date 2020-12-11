<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;

class Validation extends BladeComponent
{
    /**
     * The validation type.
     *
     * @var string
     */
    public $type;

    /**
     * The validation title.
     *
     * @var string|null
     */
    public $title;

    /**
     * The validation error bag.
     *
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
