<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;
use TALLKit\Components\Tables\Datatable;

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
            Datatable::getRows($resource ?? $rows, $paginator),
            $customActions,
            $routeName,
            $theme
        );

        $this->title = $this->titlePlural;
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
            $cols->push('actions');
        }

        if ($this->mapRelationsColumn) {
            $mappedRelations = [];

            $cols = $cols->map(function ($item) use (&$mappedRelations) {
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

        return $cols;
    }
}
