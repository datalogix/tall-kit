<?php

namespace TALLKit\Components\Tables;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

        $this->search = self::getSearch($search, $searchDefault, $searchValues, $parseSearch);

        $rows = self::getRows($rows ?? $resource, $cols, $this->search, $orderBy, $orderByDirection, $paginator ?? true, $parseRows);
        $cols = self::getCols($cols, $rows, $sortable ?? self::getSortable($resource ?? $rows), $orderBy, $orderByDirection, $parseCols);

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

    /**
     * Get search.
     *
     * @param  mixed  $search
     * @param  bool|null  $searchDefault
     * @param  mixed  $searchValues
     * @param  callable|null  $parse
     * @return mixed
     */
    public static function getSearch($search, $searchDefault = true, $searchValues = null, $parse = null)
    {
        $search = Collection::make($search);
        $searchValues = Collection::make($searchValues ?? request()->all());

        if ($searchDefault ?? true) {
            $search->prepend(['placeholder' => __('Enter your search term...')], 'q');
        }

        $search = $search->mapWithKeys(function ($field, $key) use ($searchValues) {
            $field = is_scalar($field) ? ['name' => $field] : $field;

            $name = data_get($field, 'name', $key);
            $value = data_get($field, 'value', $searchValues->get($name));

            $field = data_set($field, 'name', $name);
            $field = data_set($field, 'value', $value);

            return [$name => $field];
        });

        return is_callable($parse)
            ? $parse($search)
            : $search;
    }

    /**
     * Get rows.
     *
     * @param  mixed  $rows
     * @param  mixed  $cols
     * @param  mixed  $search
     * @param  string|null  $orderBy
     * @param  string|null  $orderByDirection
     * @param  \Illuminate\Contracts\Pagination\Paginator|int|bool|null  $paginator
     * @param  callable|null  $parse
     * @return mixed
     */
    public static function getRows($rows, $cols = null, $search = null, $orderBy = null, $orderByDirection = null, $paginator = true, $parse = null)
    {
        if (is_string($rows)) {
            try {
                $rows = app($rows);
            } catch (BindingResolutionException $e) {
                $rows = app('App\Models\\'.Str::studly($rows));
            }
        }

        if ($rows instanceof Model) {
            $cols = $cols ? Collection::make($cols)->keys()->toArray() : $rows->getFillable();
            $rows = $rows->query();
        }

        if ($rows instanceof Builder) {
            $rows = self::applyFilters($rows, $cols, $search);
            $rows = self::applyOrderBy($rows, $orderBy, $orderByDirection);
            $rows = self::applyPaginator($rows, $paginator);
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
     * @param  bool|null  $sortable
     * @param  string|null  $orderBy
     * @param  string|null  $orderByDirection
     * @param  callable|null  $parse
     * @return mixed
     */
    public static function getCols($cols, $rows = null, $sortable = null, $orderBy = null, $orderByDirection = null, $parse = null)
    {
        $firstRow = Collection::make(Collection::make($rows instanceof Paginator ? $rows->items() : $rows)->first());
        $cols = Collection::make($cols ?? $firstRow->keys());

        if ($firstRow->isEmpty() && $cols->isEmpty()) {
            return [];
        }

        $cols = $cols->map(function ($col, $key) use ($sortable, $orderBy, $orderByDirection) {
            $col = is_array($col)
                ? $col
                : ['name' => is_int($key) ? $col : $key, 'title' => is_string($col) ? $col : $key];

            $name = Str::lower(data_get($col, 'name', is_int($key) ? $col : $key));
            $colSortable = data_get($col, 'sortable', $sortable);

            data_set($col, 'sortable', $colSortable && $orderBy === $name ? $orderByDirection : $colSortable);

            return $col;
        });

        return is_callable($parse)
            ? $parse($cols)
            : $cols;
    }

    /**
     * Get sortable.
     *
     * @param  mixed  $rows
     * @return bool
     */
    public static function getSortable($rows)
    {
        return ! ($rows instanceof EloquentCollection || $rows instanceof Paginator);
    }

    /**
     * Apply filters.
     *
     * @param  mixed  $rows
     * @param  mixed  $cols
     * @param  mixed  $search
     * @return mixed
     */
    protected static function applyFilters($rows, $cols = null, $search = null)
    {
        if (! $rows->hasGlobalMacro('filter')) {
            return $rows;
        }

        $cols = Collection::make($cols);
        $search = Collection::make($search);
        $searchCols = $search->pluck('name', 'name')->only($cols);

        $rows = $rows->when($searchCols->isNotEmpty(), function (Builder $query) use ($searchCols, $search) {
            $searchFilter = $searchCols->mapWithKeys(function ($name) use ($search) {
                return [$name => data_get($search->get($name), 'value')];
            });

            return $query->filter($searchFilter->toArray());
        });

        if ($search->has('q') && $cols->isNotEmpty() && $q = data_get($search->get('q'), 'value')) {
            $rows = $rows->whereLike($cols->toArray(), $q);
        }

        return $rows;
    }

    /**
     * Apply orderBy.
     *
     * @param  mixed  $rows
     * @param  string|null  $orderBy
     * @param  string|null  $orderByDirection
     * @return mixed
     */
    protected static function applyOrderBy($rows, $orderBy = null, $orderByDirection = null)
    {
        if (! $orderBy) {
            return $rows;
        }

        $direction = $orderByDirection === 'asc' || $orderByDirection == 'desc' ? $orderByDirection : 'asc';

        return $rows->orderBy($orderBy, $direction);
    }

    /**
     * Apply paginator.
     *
     * @param  mixed  $rows
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|int|null  $paginator
     * @return mixed
     */
    protected static function applyPaginator($rows, $paginator = true)
    {
        if ($paginator === true) {
            return $rows->paginate();
        }

        if (intval($paginator)) {
            return $rows->paginate(intval($paginator));
        }

        return $rows->get();
    }
}
