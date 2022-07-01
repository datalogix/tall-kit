<?php

namespace TALLKit\Components\Tables;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Str;
use TALLKit\Concerns\DatatableHelpers;

class Datatable extends Table
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $search;

    /**
     * @var \Illuminate\Contracts\Pagination\Paginator|int|bool|null
     */
    public $paginator;

    /**
     * @var string
     */
    public $paginatorPosition;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $search
     * @param  bool|null  $searchDefault
     * @param  mixed  $searchValues
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  mixed  $resource
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  \Illuminate\Contracts\Pagination\Paginator|int|bool|null  $paginator
     * @param  string|null  $paginatorPosition
     * @param  callable|null  $parseSearch
     * @param  callable|null  $parseCols
     * @param  callable|null  $parseRows
     * @param  bool|null  $sortable
     * @param  string|null  $orderBy
     * @param  string|null  $orderByDirection
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $search = null,
        $searchDefault = null,
        $searchValues = null,
        $cols = null,
        $rows = null,
        $resource = null,
        $footer = null,
        $emptyText = null,
        $paginator = null,
        $paginatorPosition = null,
        $parseSearch = null,
        $parseCols = null,
        $parseRows = null,
        $sortable = null,
        $orderBy = null,
        $orderByDirection = null,
        $theme = null
    ) {
        $orderBy = Str::lower($orderBy ?? request('orderBy'));
        $orderByDirection = Str::lower($orderByDirection ?? request('orderByDirection', 'asc'));

        $this->search = DatatableHelpers::getSearch($search, $searchDefault, $searchValues, $parseSearch);

        $rows = DatatableHelpers::getRows($rows ?? $resource, $cols, $this->search, $orderBy, $orderByDirection, $paginator ?? true, $parseRows);
        $cols = DatatableHelpers::getCols($cols, $rows, $sortable ?? DatatableHelpers::getSortable($resource ?? $rows), $orderBy, $orderByDirection, $parseCols);

        $this->paginatorPosition = $paginatorPosition ?? 'both';
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
}
