<?php

namespace TALLKit\Components\Crud;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Illuminate\Support\Str;

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
     * @var bool
     */
    public $mapRelationsColumn;

    /**
     * @var mixed
     */
    public $cols;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $prefix
     * @param  string|bool|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  mixed  $customActions
     * @param  string|bool|null  $routeName
     * @param  bool|null  $displayIdColumn
     * @param  bool|null  $displayActionsColumn
     * @param  bool|null  $mapRelationsColumn
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
        $displayIdColumn = null,
        $displayActionsColumn = null,
        $mapRelationsColumn = null,
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
        $this->displayIdColumn = $displayIdColumn ?? false;
        $this->displayActionsColumn = $displayActionsColumn ?? true;
        $this->mapRelationsColumn = $mapRelationsColumn ?? true;
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
        $cols = Collection::make($cols ?? $this->getColsFromResource());

        if (($this->resource instanceof Paginator || $this->resource instanceof Enumerable)
            && $this->resource->isEmpty()
            && $cols->isEmpty()
        ) {
            return $cols->toArray();
        }

        if (! $this->displayIdColumn) {
            $cols->forget($cols->search('id'), $cols->search('ID'));
        }

        if ($this->displayActionsColumn) {
            $cols->push('actions');
        }

        if ($this->mapRelationsColumn) {
            $mappedRelations = [];

            $cols = $cols->map(function($item) use (&$mappedRelations) {
                if (in_array($item, $mappedRelations)) {
                    return false;
                }

                if (Str::endsWith($item, '_id')) {
                    $item = Str::replaceLast('_id', '', $item);

                    array_push($mappedRelations, $item);
                }

                return $item;
            })->filter();
        }

        return $cols->toArray();
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
