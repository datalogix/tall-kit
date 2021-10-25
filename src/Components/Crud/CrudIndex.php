<?php

namespace TALLKit\Components\Crud;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class CrudIndex extends Crud
{
    /**
     * @var bool
     */
    public $displayIdColumn;

    /**
     * @var bool
     */
    public $displayActionsColumn;

    /**
     * @var mixed
     */
    public $cols;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $prefix
     * @param  string|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  mixed  $customActions
     * @param  string|null  $routeName
     * @param  bool  $displayIdColumn
     * @param  bool  $displayActionsColumn
     * @param  mixed  $rows
     * @param  mixed  $cols
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $prefix = null,
        $key = null,
        $title = null,
        $parameters = null,
        $resource = null,
        $customActions = null,
        $routeName = null,
        $displayIdColumn = false,
        $displayActionsColumn = true,
        $rows = null,
        $cols = null,
        $theme = null
    ) {
        parent::__construct(
            $prefix,
            $key,
            $title,
            $parameters,
            $resource ?? $rows,
            $customActions,
            $routeName,
            $theme
        );

        $this->title = $this->titlePlural;
        $this->displayIdColumn = $displayIdColumn;
        $this->displayActionsColumn = $displayActionsColumn;
        $this->cols = $this->getCols($cols);
    }

    /**
     * Get cols.
     *
     * @param  mixed  $cols
     * @return array
     */
    protected function getCols($cols)
    {
        $cols = Collection::make($cols ?? $this->getColsFromResource())->toArray();

        if (! $this->displayIdColumn) {
            $idIndex = array_search('id', $cols);
            if ($idIndex !== false) {
                unset($cols[$idIndex]);
            }

            $idIndex = array_search('ID', $cols);
            if ($idIndex !== false) {
                unset($cols[$idIndex]);
            }

            unset($cols['id']);
        }

        if ($this->displayActionsColumn) {
            $cols[] = 'actions';
        }

        return $cols;
    }

    /**
     * Get cols from resource.
     *
     * @return array
     */
    protected function getColsFromResource()
    {
        $resource = Collection::make($this->resource instanceof Paginator
            ? $this->resource->items()
            : $this->resource
        )->first();

        return Collection::make($resource)->keys()->toArray();
    }
}
