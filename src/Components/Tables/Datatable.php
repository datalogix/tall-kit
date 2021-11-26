<?php

namespace TALLKit\Components\Tables;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
     * @param  callable|null  $parseSearch
     * @param  callable|null  $parseCols
     * @param  callable|null  $parseRows
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
        $parseSearch = null,
        $parseCols = null,
        $parseRows = null,
        $theme = null
    ) {
        $this->search = self::getSearch($search, $searchDefault, $parseSearch);

        $rows = self::getRows($rows ?? $resource, $cols, $this->search, $paginator, $parseRows);
        $cols = self::getCols($cols, $rows, $parseCols);

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

        $rows = self::applyFilters($rows, $cols, $search);

        if ($rows instanceof Builder) {
            $rows = ($paginator ?? true)
                ? $rows->paginate()
                : $rows->get();
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
    public static function getCols($cols, $rows = null, $parse = null)
    {
        $firstRow = Collection::make(Collection::make($rows instanceof Paginator ? $rows->items() : $rows)->first());
        $cols = Collection::make($cols ?? $firstRow->keys());

        if ($firstRow->isEmpty() && $cols->isEmpty()) {
            return [];
        }

        return is_callable($parse)
            ? $parse($cols)
            : $cols;
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
        if (! ($rows instanceof Builder && $rows->hasGlobalMacro('filter'))) {
            return $rows;
        }

        $cols = Collection::make($cols);
        $search = Collection::make($search)->map(function ($value, $key) {
            return $value['name'] ?? $key;
        });

        $rows = $rows->when($search->only($cols)->isNotEmpty(), function (Builder $query) use ($search, $cols) {
            return $query->filter(request($search->only($cols)->toArray()));
        });

        if ($search->has('q') && $cols->isNotEmpty() && $q = request('q')) {
            $rows = $rows->whereLike($cols->toArray(), $q);
        }

        return $rows;
    }
}
