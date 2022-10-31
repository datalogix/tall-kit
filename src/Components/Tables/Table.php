<?php

namespace TALLKit\Components\Tables;

use Illuminate\Support\Collection;
use TALLKit\Components\BladeComponent;

class Table extends BladeComponent
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $cols;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $rows;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $footer;

    /**
     * @var string|null
     */
    public $emptyText;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $cols = null,
        $rows = null,
        $footer = null,
        $emptyText = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->cols = Collection::wrap($cols);
        $this->rows = Collection::wrap($rows);
        $this->footer = Collection::wrap($footer);
        $this->emptyText = $emptyText;
    }
}
