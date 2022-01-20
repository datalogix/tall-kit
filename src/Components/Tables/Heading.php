<?php

namespace TALLKit\Components\Tables;

use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;

class Heading extends BladeComponent
{
    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string
     */
    public $align;

    /**
     * @var string|bool
     */
    public $sortable;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $align
     * @param  string|bool|null  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $align = null,
        $sortable = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->align = $align ?: 'left';
        $this->sortable = Str::lower($sortable) ?: false;
    }
}
