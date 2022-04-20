<?php

namespace TALLKit\Components\Livewire\Tables;

use Livewire\WithPagination;
use TALLKit\Components\LivewireComponent;
use TALLKit\Components\Tables\Datatable as TablesDatatable;

class Datatable extends LivewireComponent
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
     * @var string|null
     */
    public $theme;

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
        $this->searchFields = TablesDatatable::getSearch($this->search, $this->searchDefault, $this->searchValues);
        $this->searchFields->each(function($field, $key) {
            $name = data_get($field, 'name', $key);
            $this->searchValues[$name] = $this->{$name} = $this->{$name} ?? data_get($field, 'value');
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
