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

        $this->title = $this->titlePlural;
        $this->search = $search;
        $this->searchDefault = $searchDefault;
        $this->displayIdColumn = $displayIdColumn ?? false;
        $this->displayActionsColumn = $displayActionsColumn ?? true;
        $this->mapRelationsColumn = $mapRelationsColumn ?? true;
        $this->cols = $this->getCols($cols);
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
    protected function getCols($cols)
    {
        $cols = Datatable::getCols($cols, $this->resource);

        if (empty($cols)) {
            return $cols;
        }

        if (! $this->displayIdColumn) {
            if ($cols->search('id') !== false) {
                $cols->forget($cols->search('id'));
            }

            if ($cols->search('Id') !== false) {
                $cols->forget($cols->search('Id'));
            }

            if ($cols->search('ID') !== false) {
                $cols->forget($cols->search('ID'));
            }
        }

        if ($this->displayActionsColumn) {
            $cols->push(['name' => 'actions', 'sortable' => false]);
        }

        if ($this->mapRelationsColumn) {
            $mappedRelations = [];

            $cols = $cols->map(function ($col) use (&$mappedRelations) {
                $col = is_array($col) ? $col : ['name' => $col];
                $name = data_get($col, 'name', $col);

                if (in_array($name, $mappedRelations)) {
                    return false;
                }

                if (Str::endsWith($name, '_id')) {
                    array_push($mappedRelations, $name);

                    data_set($col, 'name', Str::replaceLast('_id', '', $name));
                }

                return $col;
            })->filter();
        }

        return $cols;
    }
}
