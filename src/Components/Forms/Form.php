<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\BoundValues;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Form extends BladeComponent
{
    use BoundValues;

    protected array $props = [
        'init' => true,
        'method' => 'post',
        'target' => null,
        'route' => null,
        'action' => null,
        'bind' => null,
        'modelable' => null,
        'enctype' => null,
        'confirm' => null,
        'fields' => null,
    ];

    protected function processed(array $data)
    {
        $this->method = strtoupper($this->method);
        $this->action ??= route_detect($this->route, $this->bind ?? $this->getBoundTarget(), request()->url());
        if ($this->method === 'DELETE') $this->confirm ??= 'Do you really want to delete?';
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
        $this->setVariables('spoofMethod');
        $this->startFormDataBinder($this->bind, $this->modelable);
    }

    protected function finished(array $data)
    {
        $this->endFormDataBinder();
    }

    protected function attrs()
    {
        return [
            'root' => ($this->init
                    ? Attr::make(
                        attributes: [
                            'x-ref' => 'form',
                            '@submit' => 'prepareSubmit'
                        ],
                        component: 'form',
                        setup: __($this->confirm)
                    )->cloak(false) : Attr::make()
                )
                ->attr('method', $this->spoofMethod ? 'POST' : $this->method)
                ->when($this->target, fn ($attr, $value) => $attr->attr('target', $value))
                ->when($this->action, fn ($attr, $value) => $attr->attr('action', $value))
                ->when($this->enctype, fn ($attr, $value) => $attr->attr('enctype', $value)),

            'fields' => Attr::make(
                attributes: ['fields' => $this->fields]
            )
        ];
    }
}
