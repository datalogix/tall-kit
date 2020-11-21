<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;
use Illuminate\Support\Str;

class Errors extends BladeComponent
{
    /**
     * The error name.
     *
     * @var string
     */
    public $name;

    /**
     * The error bag.
     *
     * @var string
     */
    public $bag;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $bag
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $bag = 'default',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = str_replace(['[', ']'], ['.', ''], Str::before($name, '[]'));
        $this->bag = $bag;
    }
}
