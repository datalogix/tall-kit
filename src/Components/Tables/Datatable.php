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
        $rows = self::getRows($rows ?? $resource, $paginator, $parseRows);
        $cols = self::getCols($cols, $rows, $parseCols);

        $this->paginator = $paginator;

        if ($rows instanceof Paginator) {
            $this->paginator = $rows;
            $rows = $rows->items();
        }

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
    public static function getRows($rows, $paginator = true, $parse = null)
    {
        if (is_string($rows)) {
            $rows = app($rows);
        }

        if ($rows instanceof Model) {
            $rows = $rows->query();
        }

        if ($rows instanceof Builder) {
            $rows = ($paginator ?? true)
                ? $rows->paginate()
                : $rows->get();
        }

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
    public static function getCols($cols, $rows = null, $parse = null)
    {
        $firstRow = Collection::make(Collection::make($rows instanceof Paginator ? $rows->items() : $rows)->first());
        $cols = Collection::make($cols ?? $firstRow->keys());

        if ($firstRow->isEmpty() && $cols->isEmpty()) {
            return [];
        }

        return is_callable($parse)
            ? $parse($cols)
            : $cols;
    }
}
