<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;
use TALLKit\Concerns\DatatableHelpers;

class CrudIndex extends AbstractCrud
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'tooltip' => true,
            'search' => null,
            'searchDefault' => null,
            'searchValues' => null,
            'searchModelable' => null,
            'displayIdColumn' => null,
            'displayActionsColumn' => null,
            'mapRelationsColumn' => null,
            'cols' => null,
            'footer' => null,
            'emptyText' => null,
            'paginatorPosition' => null,
            'orderBy' => null,
            'orderByDirection' => null,
        ]);
    }

    protected function processed(array $data)
    {
        $search = DatatableHelpers::getSearch($this->search, $this->searchDefault, $this->searchValues, $this->parseSearch);

        $this->resource ??= DatatableHelpers::getRows($this->resource ?? $this->rows, $this->cols, $search, $this->orderBy, $this->orderByDirection, $this->paginator ?? true, $this->parseRows);
        $this->title ??= (string) Str::of($this->title)->plural()->title();
        $this->searchValues ??= request()->all();
        $this->displayIdColumn ??= false;
        $this->displayActionsColumn ??= true;
        $this->mapRelationsColumn ??= true;
        $this->cols ??= $this->getCols($this->cols, $this->sortable ?? DatatableHelpers::getSortable($this->resource ?? $this->rows), $this->parseCols);

        $this->startFormDataBinder($this->searchValues, $this->searchModelable);
    }

    protected function finished(array $data)
    {
        $this->endFormDataBinder();
    }

    protected function getCols($cols, $sortable = null, $parse = null)
    {
        $cols = DatatableHelpers::getCols($cols, $this->resource, $sortable, $this->orderBy, $this->orderByDirection, $parse);

        if (empty($cols)) {
            return $cols;
        }

        if (! $this->displayIdColumn) {
            $pos = $cols->search(function ($col, $key) {
                return Str::lower(target_get($col, 'name', is_int($key) ? $col : $key)) === 'id';
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
                $name = target_get($col, 'name', is_int($key) ? $col : $key);

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

    protected function attrs()
    {
        return [
            'root' => [
                'class' => 'mb-4',
            ],

            'header' => [
                'title' => $this->title
            ],

            'create-many' => [
                'preset' => 'create-many',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip,
                'href' => $this->route
            ],

            'create' => [
                'preset' => 'create',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip,
                'href' => $this->route
            ],

            'datatable' => [
                'search' => $this->search,
                'search-default' => $this->searchDefault,
                'search-values' => $this->searchValues,
                'search-modelable' => $this->searchModelable,
                'cols' => $this->cols,
                'resource' => $this->resource,
                'footer' => $this->footer,
                'empty-text' => $this->emptyText,
                'paginator-position' => $this->paginatorPosition,
                'order-by' => $this->orderBy,
                'order-by-direction' => $this->orderByDirection,
            ],

            'row-actions' => [
                'class' => 'flex space-x-2 items-center justify-end',
            ],

            'actions' => [
                'prefix' => $this->prefix,
                'key' => $this->key,
                'title' => $this->title,
                'force-menu' => $this->forceMenu,
                'max-actions' => $this->maxActions,
                'actions' => $this->actions,
                'route-name' => $this->routeName,
                'tooltip' => $this->tooltip,
            ],
        ];
    }
}
