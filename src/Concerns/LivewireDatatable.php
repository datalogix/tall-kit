<?php

namespace TALLKit\Concerns;

use Livewire\WithPagination;

trait LivewireDatatable
{
    use WithPagination;

    /**
     * @var string|null
     */
    public $modifier;

    /**
     * @var mixed
     */
    public $search;

    /**
     * @var bool|null
     */
    public $searchDefault;

    /**
     * @var mixed
     */
    public $searchValues;

    /**
     * @var string|bool|null
     */
    public $searchModelable;

    /**
     * @var mixed
     */
    public $cols;

    /**
     * @var mixed
     */
    public $rows;

    /**
     * @var mixed
     */
    public $resource;

    /**
     * @var mixed
     */
    public $footer;

    /**
     * @var string|null
     */
    public $emptyText;

    /**
     * @var \Illuminate\Contracts\Pagination\Paginator|int|bool|null
     */
    public $paginator;

    /**
     * @var string|null
     */
    public $paginatorPosition;

    /**
     * @var callable|null
     */
    public $parseSearch;

    /**
     * @var callable|null
     */
    public $parseCols;

    /**
     * @var callable|null
     */
    public $parseRows;

    /**
     * @var bool|null
     */
    public $sortable;

    /**
     * @var string|null
     */
    public $orderBy;

    /**
     * @var string|null
     */
    public $orderByDirection;

    /**
     * @var mixed
     */
    protected $searchFields;

    /**
     * Mount.
     *
     * @return void
     */
    public function mount()
    {
        $this->searchFields();
    }

    /**
     * Updated.
     *
     * @return void
     */
    public function updated()
    {
        $this->searchFields();
    }

    /**
     * Query String.
     *
     * @return array
     */
    protected function queryString()
    {
        $sortableQueryString = $this->sortable === false ? [] : ['orderBy', 'orderByDirection'];

        return $this->searchFields
            ? $this->searchFields->keys()->concat($sortableQueryString)->toArray()
            : $sortableQueryString;
    }

    /**
     * Search fields.
     *
     * @return void
     */
    protected function searchFields()
    {
        $this->searchFields = DatatableHelpers::getSearch($this->search, $this->searchDefault, $this->searchValues);
        $this->searchFields->each(function ($field, $key) {
            $name = target_get($field, 'name', $key);
            $this->searchValues[$name] = $this->{$name} = $this->{$name} ?? target_get($field, 'value');
        });
    }

    /**
     * Update order by.
     *
     * @param  string  $orderBy
     * @param  string  $orderByDirection
     * @return void
     */
    public function updateOrderBy($orderBy, $orderByDirection)
    {
        $this->orderBy = $orderBy;
        $this->orderByDirection = $orderByDirection;
    }
}
