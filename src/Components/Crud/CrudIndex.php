<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;
use TALLKit\Concerns\DatatableHelpers;

class CrudIndex extends Crud
{
    /**
     * @var mixed
     */
    public $search;

    /**
     * @var bool|null
     */
    public $searchDefault;

    /**
     * @var bool
     */
    public $displayIdColumn;

    /**
     * @var bool
     */
    public $displayActionsColumn;

    /**
     * @var bool
     */
    public $mapRelationsColumn;

    /**
     * @var mixed
     */
    public $cols;

    /**
     * @var mixed
     */
    public $footer;

    /**
     * @var string|null
     */
    public $emptyText;

    /**
     * @var string|null
     */
    public $paginatorPosition;

    /**
     * @var string|null
     */
    public $orderBy;

    /**
     * @var string|null
     */
    public $orderByDirection;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $prefix
     * @param  string|bool|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $model
     * @param  mixed  $search
     * @param  bool|null  $searchDefault
     * @param  mixed  $searchValues
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  bool|null  $forceMenu
     * @param  int|null  $maxActions
     * @param  mixed  $actions
     * @param  string|bool|null  $routeName
     * @param  string|bool|null  $tooltip
     * @param  bool|null  $displayIdColumn
     * @param  bool|null  $displayActionsColumn
     * @param  bool|null  $mapRelationsColumn
     * @param  mixed  $rows
     * @param  mixed  $cols
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
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
        $prefix = null,
        $key = null,
        $title = null,
        $model = null,
        $search = null,
        $searchDefault = null,
        $searchValues = null,
        $parameters = null,
        $resource = null,
        $forceMenu = null,
        $maxActions = null,
        $actions = null,
        $routeName = null,
        $tooltip = null,
        $displayIdColumn = null,
        $displayActionsColumn = null,
        $mapRelationsColumn = null,
        $rows = null,
        $cols = null,
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
        $search = DatatableHelpers::getSearch($search, $searchDefault, $searchValues, $parseSearch);

        parent::__construct(
            $prefix,
            $key,
            $title,
            $model,
            $parameters,
            DatatableHelpers::getRows($resource ?? $rows, $cols, $search, $orderBy, $orderByDirection, $paginator ?? true, $parseRows),
            $forceMenu,
            $maxActions,
            $actions,
            $routeName,
            $tooltip,
            $theme
        );

        $this->title = (string) Str::of($this->title)->plural()->title();
        $this->search = $search;
        $this->searchDefault = $searchDefault;
        $this->displayIdColumn = $displayIdColumn ?? false;
        $this->displayActionsColumn = $displayActionsColumn ?? true;
        $this->mapRelationsColumn = $mapRelationsColumn ?? true;
        $this->cols = $this->getCols($cols, $sortable ?? DatatableHelpers::getSortable($resource ?? $rows), $parseCols);
        $this->footer = $footer;
        $this->emptyText = $emptyText;
        $this->paginatorPosition = $paginatorPosition;
        $this->orderBy = $orderBy;
        $this->orderByDirection = $orderByDirection;
    }

    /**
     * Get cols.
     *
     * @param  mixed  $cols
     * @param  bool|null  $sortable
     * @param  callable|null  $parse
     * @return mixed
     */
    protected function getCols($cols, $sortable = null, $parse = null)
    {
        $cols = DatatableHelpers::getCols($cols, $this->resource, $sortable, $this->orderBy, $this->orderByDirection, $parse);

        if (empty($cols)) {
            return $cols;
        }

        if (! $this->displayIdColumn) {
            $pos = $cols->search(function ($col, $key) {
                return Str::lower(target_get($col, 'name', is_int($key) ? $col : $key)) === 'id';
            });

            if ($pos !== false) {
                $cols->forget($pos);
            }
        }

        if ($this->displayActionsColumn) {
            $cols->push(['name' => 'actions', 'sortable' => false]);
        }

        if ($this->mapRelationsColumn) {
            $mappedRelations = [];

            $cols = $cols->mapWithKeys(function ($col, $key) use (&$mappedRelations) {
                $name = target_get($col, 'name', is_int($key) ? $col : $key);

                if (in_array($name, $mappedRelations)) {
                    return [];
                }

                if (Str::endsWith($name, '_id')) {
                    array_push($mappedRelations, $name);
                    data_set($col, 'name', Str::replaceLast('_id', '', $name));
                }

                return [Str::replaceLast('_id', '', $name) => $col];
            })->filter();
        }

        return $cols;
    }
}
