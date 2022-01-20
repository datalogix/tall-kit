<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;
use TALLKit\Components\Tables\Datatable;

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
     * @var \Illuminate\Contracts\Pagination\Paginator|bool|null
     */
    public $paginator;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $prefix
     * @param  string|bool|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $search
     * @param  bool|null  $searchDefault
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  mixed  $customActions
     * @param  string|bool|null  $routeName
     * @param  bool|null  $displayIdColumn
     * @param  bool|null  $displayActionsColumn
     * @param  bool|null  $mapRelationsColumn
     * @param  mixed  $rows
     * @param  mixed  $cols
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
     * @param  bool|null  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $prefix = null,
        $key = null,
        $title = null,
        $search = null,
        $searchDefault = null,
        $parameters = null,
        $resource = null,
        $customActions = null,
        $routeName = null,
        $displayIdColumn = null,
        $displayActionsColumn = null,
        $mapRelationsColumn = null,
        $rows = null,
        $cols = null,
        $footer = null,
        $emptyText = null,
        $paginator = null,
        $sortable = null,
        $theme = null
    ) {
        parent::__construct(
            $prefix,
            $key,
            $title,
            $parameters,
            Datatable::getRows($resource ?? $rows, $cols, Datatable::getSearch($search, $searchDefault), $paginator),
            $customActions,
            $routeName,
            $theme
        );

        $this->title = (string) Str::of($this->title)->plural()->title();
        $this->search = $search;
        $this->searchDefault = $searchDefault;
        $this->displayIdColumn = $displayIdColumn ?? false;
        $this->displayActionsColumn = $displayActionsColumn ?? true;
        $this->mapRelationsColumn = $mapRelationsColumn ?? true;
        $this->cols = $this->getCols($cols, $sortable ?? Datatable::getDefaultSortable($resource ?? $rows));
        $this->footer = $footer;
        $this->emptyText = $emptyText;
        $this->paginator = $paginator;
    }

    /**
     * Get cols.
     *
     * @param  mixed  $cols
     * @return mixed
     */
    protected function getCols($cols, $sortable = null)
    {
        $cols = Datatable::getCols($cols, $this->resource, $sortable);

        if (empty($cols)) {
            return $cols;
        }

        if (! $this->displayIdColumn) {
            $pos = $cols->search(function($col, $key) {
                return Str::lower(data_get($col, 'name', is_int($key) ? $col : $key)) === 'id';
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
                $name = data_get($col, 'name', is_int($key) ? $col : $key);

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
