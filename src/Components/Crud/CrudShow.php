<?php

namespace TALLKit\Components\Crud;

class CrudShow extends AbstractCrud
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'back' => null,
            'forceMenu' => true
        ]);
    }

    protected function processed(array $data)
    {
        if ($this->resourceTitle) {
            $this->title = $title ?? __($this->title).' - '.$this->resourceTitle;
        }

        $this->back ??= url()->current() === url()->previous() ? route_detect($this->prefix.'.index', null, null) : null;

        $this->startFormDataBinder($this->resource);
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
            ],

            'header' => [
                'title' => $this->title,
            ],

            'header-actions' => [
                'prefix' => $this->prefix,
                'key' => $this->key,
                'title' => $this->title,
                'parameters' => array_merge($this->parameters, [$this->resource]),
                'resource' => $this->resource,
                'force-menu' => $this->forceMenu,
                'max-actions' => $this->maxActions,
                'actions' => $this->actions,
                'route-name' => $this->routeName,
                'tooltip' => $this->tooltip,
            ],

            'header-back' => [
                'preset' => 'back-right',
                'href' => $this->back,
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip,
            ],

            'content' => [],

            'footer' => [
                'class' => 'flex space-x-2 items-center justify-end pt-4',
            ],

            'footer-actions' => [
                'prefix' => $this->prefix,
                'key' => $this->key,
                'title' => $this->title,
                'parameters' => array_merge($this->parameters, [$this->resource]),
                'resource' => $this->resource,
                'force-menu' => $this->forceMenu,
                'max-actions' => $this->maxActions,
                'actions' => $this->actions,
                'route-name' => $this->routeName,
                'tooltip' => $this->tooltip,
            ],

            'footer-back' => [
                'preset' => 'back-right',
                'href' => $this->back,
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip,
            ],
        ];
    }
}
