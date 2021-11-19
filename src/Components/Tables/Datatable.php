<?php

namespace TALLKit\Components\Tables;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Datatable extends Table
{
    /**
     * @var \Illuminate\Contracts\Pagination\Paginator|bool|null
     */
    public $paginator;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  mixed  $resource
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
     * @param  callable|null  $parseCols
     * @param  callable|null  $parseRows
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $cols = null,
        $rows = null,
        $resource = null,
        $footer = null,
        $emptyText = null,
        $paginator = null,
        $parseCols = null,
        $parseRows = null,
        $theme = null
    ) {
        $rows = $this->getRows($rows ?? $resource, $paginator ?? true, $parseRows);
        $cols = $this->getCols($cols, $rows, $parseCols);

        parent::__construct(
            $cols,
            $rows,
            $footer,
            $emptyText,
            $theme
        );
    }

    /**
     * Get rows.
     *
     * @param  mixed  $rows
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
     * @param  callable|null  $parse
     * @return mixed
     */
    protected function getRows($rows, $paginator = true, $parse = null)
    {
        if (is_string($rows)) {
            $rows = app($rows);
        }

        if ($rows instanceof Model) {
            $rows = $rows->query();
        }

        if ($rows instanceof Builder) {
            $rows = $paginator
                ? $rows->paginate()
                : $rows->get();
        }

        if ($rows instanceof Paginator && $paginator === true) {
            $paginator = $rows;
            $rows = $rows->items();
        }

        $this->paginator = $paginator instanceof Paginator
            ? $paginator
            : false;

        return is_callable($parse)
            ? $parse($rows)
            : $rows;
    }

    /**
     * Get cols.
     *
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  callable|null  $parse
     * @return mixed
     */
    protected function getCols($cols, $rows, $parse = null)
    {
        $cols = Collection::make($cols ?? Collection::make(Collection::make($rows)->first())->keys());

        if (empty($rows) && empty($cols)) {
            return [];
        }

        return is_callable($parse)
            ? $parse($cols)
            : $cols;
    }
}
