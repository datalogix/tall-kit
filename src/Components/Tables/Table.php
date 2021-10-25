<?php

namespace TALLKit\Components\Tables;

use Illuminate\Contracts\Pagination\Paginator;
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
     * @var \Illuminate\Contracts\Pagination\Paginator|bool|null
     */
    public $paginator;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $cols = null,
        $rows = null,
        $footer = null,
        $emptyText = null,
        $paginator = null,
        $theme = null
    ) {
        parent::__construct($theme);

        if ($rows instanceof Paginator && ($paginator === true || is_null($paginator))) {
            $paginator = $rows;
            $rows = $rows->items();
        }

        $this->cols = Collection::make($cols);
        $this->rows = Collection::make($rows);
        $this->footer = Collection::make($footer);
        $this->emptyText = $emptyText;
        $this->paginator = $paginator;
    }
}
