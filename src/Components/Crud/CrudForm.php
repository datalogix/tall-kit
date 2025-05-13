<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;

class CrudForm extends AbstractCrud
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'init' => null,
            'method' => null,
            'route' => null,
            'action' => null,
            'modelable' => null,
            'enctype' => null,
            'confirm' => null,
            'fields' => null,
            'back' => null,
        ]);
    }

    protected function processed(array $data)
    {
        $this->title ??= __(Str::title($this->resource ? 'edit' : 'create')).' '.__($this->title);
        $this->method ??= $this->resource ? 'patch' : 'post';
        $this->route ??= $this->prefix.'.'.($this->resource ? 'update' : 'store');
        $this->action ??= route_detect($this->route, array_filter([...$this->parameters, $this->resource]), null);
        $this->back ??= url()->current() === url()->previous() ? route_detect($this->prefix.'.index', $this->parameters, null) : null;

        $this->startFormDataBinder($this->resource, $this->modelable);
    }

    protected function finished(array $data)
    {
        $this->endFormDataBinder();
    }

    protected function attrs()
    {
        return [
            'root' => [
                'class' => 'mb-4',
                'init' => $this->init,
                'method' => $this->method,
                'action' => $this->action,
                'route' => $this->route,
                'resource' => $this->resource,
                'modelable' => $this->modelable,
                'enctype' => $this->enctype,
                'confirm' => $this->confirm,
            ],

            'header' => [
                'title' => $this->title
            ],

            'header-save' => [
                'name' => 'crud-form',
                'value' => 'save',
                'preset' => 'save',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'header-save-and-view' => [
                'name' => 'crud-form',
                'value' => 'save-and-view',
                'preset' => 'save-and-view',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'header-back' => [
                'preset' => 'back-right',
                'href' => $this->back,
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'content' => [],

            'fields' => [
                'fields' => $this->fields
            ],

            'footer' => [
                'class' => 'flex space-x-2 items-center justify-end pt-4',
            ],

            'footer-save' => [
                'name' => 'crud-form',
                'value' => 'save',
                'preset' => 'save',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'footer-save-and-view' => [
                'name' => 'crud-form',
                'value' => 'save-and-view',
                'preset' => 'save-and-view',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'footer-back' => [
                'preset' => 'back-right',
                'href' => $this->back,
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],
        ];
    }
}
