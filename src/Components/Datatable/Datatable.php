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
     * @var mixed
     */
    public $searchValues;

    /**
     * @var string|bool|null
     */
    public $searchModelable;

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
     * @param  string|bool|null  $searchModelable
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
     * @param  array|null  $props
     * @return void
     */
    public function __construct(
        $search = null,
        $searchDefault = null,
        $searchValues = null,
        $searchModelable = null,
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
        $props = null
    ) {
        $this->setProps($props);

        $searchValues ??= $this->props('searchValues', request()->all());
        $resource = $this->props('resource');
        $orderBy = Str::lower($orderBy ?? $this->props('orderBy', request('orderBy')));
        $orderByDirection = Str::lower($orderByDirection ?? $this->props('orderByDirection', request('orderByDirection', 'asc')));

        $this->search = DatatableHelpers::getSearch(
            search: $search ?? $this->props('search'),
            searchDefault: $searchDefault ?? $this->props('searchDefault'),
            searchValues: $searchValues,
            parse: $parseSearch ?? $this->props('parseSearch')
        );

        $this->searchValues = $searchValues;
        $this->searchModelable = $searchModelable ?? $this->props('searchModelable');
        $this->paginatorPosition = $paginatorPosition ?? $this->props('paginatorPosition', 'both');
        $this->paginator = $paginator ?? $this->props('paginator', true);

        $rows = DatatableHelpers::getRows(
            rows: $rows ?? $resource,
            cols: $cols,
            search: $this->search,
            orderBy: $orderBy,
            orderByDirection: $orderByDirection,
            paginator: $this->paginator,
            parse: $parseRows ?? $this->props('parseRows')
        );

        $cols = DatatableHelpers::getCols(
            cols: $cols,
            rows: $rows,
            sortable: $sortable ?? $this->props('sortable') ?? DatatableHelpers::getSortable($resource ?? $rows),
            orderBy: $orderBy,
            orderByDirection: $orderByDirection,
            parse: $parseCols ?? $this->props('parseCols')
        );

        if ($rows instanceof Paginator) {
            $this->paginator = $rows;
            $rows = $rows->items();
        }

        parent::__construct(
            cols: $cols,
            rows: $rows,
            footer: $footer ?? $this->props('footer'),
            emptyText: $emptyText ?? $this->props('emptyText'),
            props: $props,
        );

        $this->startFormDataBinder($this->searchValues, $this->searchModelable);
    }

    /**
     * {@inheritdoc}
     */
    protected function getAttrs()
    {
        return [
            'root' => [],

            'search' => [
                'class' => 'mb-4',
            ],

            'search-fields' => [
                'class' => 'grid grid-cols-1 gap-x-4 '.
                    ($this->search->count() === 1 ? 'md:grid-cols-1' : '').
                    ($this->search->count() === 2 ? 'md:grid-cols-2' : '').
                    ($this->search->count() === 3 ? 'md:grid-cols-3' : '').
                    ($this->search->count() === 4 ? 'md:grid-cols-4' : '').
                    ($this->search->count() === 5 ? 'md:grid-cols-5' : '').
                    ($this->search->count() === 6 ? 'md:grid-cols-6' : '').
                    '',
            ],

            'search-submit' => [
                'class' => 'col-span-full',
            ],

            'table' => [],
        ];
    }
}
