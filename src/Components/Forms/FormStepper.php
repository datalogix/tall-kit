<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;

class FormStepper extends Form
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
           'mode' => 'horizontal',
           'title' => null,
           'steps' => null,
           'current' => 1,
           'prev' => true,
           'next' => true,
           'loading' => true,
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'init' => $this->init,
                'method' => $this->method,
                'target' => $this->target,
                'action' => $this->action,
                'route' => $this->route,
                'bind' => $this->bind,
                'modelable' => $this->modelable,
                'enctype' => $this->enctype,
                'confirm' => $this->confirm,
                'fields' => $this->fields,
            ],

            'header' => [
                'class' => 'mx-auto mb-6 text-xl font-semibold text-center',
            ],

            'steps' => [
                'mode' => $this->mode,
                'steps' => $this->steps,
                'current' => $this->current,
            ],

            'horizontal-card' => [
                'class' => 'mt-6',

                'pt' => [
                    'footer' => [
                        'class' => 'flex items-center justify-center space-x-4',
                    ]
                ]
            ],

            'vertical-card' => [
                'class' => 'mt-4 ml-10',

                'pt' => [
                    'footer' => [
                        'class' => 'flex items-center justify-center space-x-4',
                    ]
                ]
            ],

            'actions' => Attr::make(
                class: 'flex items-center justify-center space-x-4'
            )->when($this->isWired(), fn ($attr) => $attr->attr('wire:loading.remove', '')),

            'prev' => Attr::make(attributes: ['preset' => 'prev'])
                ->when($this->isWired(), fn ($attr) => $attr->attr('wire:click', 'prev'))
                ->when($this->isWired(), fn ($attr) => $attr->attr('theme:container.except.wire:ignore', true)) // theme:container.except.wire:ignore
                ->unless($this->current > 1, fn ($attr) => $attr->style('display:none')),

            'next' => Attr::make(attributes: ['preset' => 'next'])
                ->when($this->isWired(), fn ($attr) => $attr->attr('theme:container.except.wire:ignore', true)) // theme:container.except.wire:ignore
                ->unless($this->current > 1, fn ($attr) => $attr->style('display:none')),

            'loading' => Attr::make()
                ->when($this->isWired(), fn ($attr) => $attr->attr('wire:loading', '')),
        ];
    }
}
