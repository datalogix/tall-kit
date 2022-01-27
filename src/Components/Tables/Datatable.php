<?php

namespace TALLKit\Components\Tables;

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
     * @var \Illuminate\Contracts\Pagination\Paginator|bool|null
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
     * @param  mixed  $cols
     * @param  mixed  $rows
     * @param  mixed  $resource
     * @param  mixed  $footer
     * @param  string|null  $emptyText
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
     * @param  string|null  $paginatorPosition
     * @param  callable|null  $parseSearch
     * @param  callable|null  $parseCols
     * @param  callable|null  $parseRows
     * @param  bool|null  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $search = null,
        $searchDefault = null,
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
        $theme = null
    ) {
        $this->search = self::getSearch($search, $searchDefault, $parseSearch);

        $rows = self::getRows($rows ?? $resource, $cols, $this->search, $paginator, $parseRows);
        $cols = self::getCols($cols, $rows, $sortable ?? self::getDefaultSortable($resource ?? $rows), $parseCols);

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
     * @param  callable|null  $parse
     * @return mixed
     */
    public static function getSearch($search, $searchDefault = true, $parse = null)
    {
        $search = Collection::make($search);

        if ($searchDefault ?? true) {
            $search->prepend(['placeholder' => __('Enter your search term...')], 'q');
        }

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
     * @param  \Illuminate\Contracts\Pagination\Paginator|bool|null  $paginator
     * @param  callable|null  $parse
     * @return mixed
     */
    public static function getRows($rows, $cols = null, $search = null, $paginator = true, $parse = null)
    {
        if (is_string($rows)) {
            $rows = app($rows);
        }

        if ($rows instanceof Model) {
            $cols = $cols ? Collection::make($cols)->keys()->toArray() : $rows->getFillable();
            $rows = $rows->query();
        }

        if ($rows instanceof Builder) {
            $rows = self::applyFilters($rows, $cols, $search);
            $rows = self::applyOrderBy($rows);
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
     * @param  callable|null  $parse
     * @return mixed
     */
    public static function getCols($cols, $rows = null, $defaultSortable = null, $parse = null)
    {
        $firstRow = Collection::make(Collection::make($rows instanceof Paginator ? $rows->items() : $rows)->first());
        $cols = Collection::make($cols ?? $firstRow->keys());

        if ($firstRow->isEmpty() && $cols->isEmpty()) {
            return [];
        }

        $cols = $cols->map(function ($col, $key) use ($defaultSortable) {
            $col = is_array($col)
                ? $col
                : ['name' => is_int($key) ? $col : $key, 'title' => is_string($col) ? $col : $key];

            $name = data_get($col, 'name', is_int($key) ? $col : $key);
            $sortable = data_get($col, 'sortable', $defaultSortable);

            data_set($col, 'sortable', $sortable && request('orderby') === $name ? request('direction', 'asc') : $sortable);

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
    public static function getDefaultSortable($rows)
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
        $search = Collection::make($search)->map(function ($value, $key) {
            return data_get($value, 'name', $key);
        });

        $rows = $rows->when($search->only($cols)->isNotEmpty(), function (Builder $query) use ($search, $cols) {
            return $query->filter(request($search->only($cols)->toArray()));
        });

        if ($search->has('q') && $cols->isNotEmpty() && $q = request('q')) {
            $rows = $rows->whereLike($cols->toArray(), $q);
        }

        return $rows;
    }

    /**
     * Apply orderBy.
     *
     * @param  mixed  $rows
     * @return mixed
     */
    protected static function applyOrderBy($rows)
    {
        $orderby = request('orderby');

        if (! $orderby) {
            return $rows;
        }

        $direction = Str::lower(request('direction'));

        return $rows->orderBy($orderby, $direction === 'asc' || $direction == 'desc' ? $direction : 'asc');
    }

    /**
     * Apply paginator.
     *
     * @param  mixed  $rows
     * @param  bool  $paginator
     * @return mixed
     */
    protected static function applyPaginator($rows, $paginator = true)
    {
        return $paginator
            ? $rows->paginate()
            : $rows->get();
    }
}
