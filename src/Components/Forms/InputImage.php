<?php

namespace TALLKit\Components\Forms;

class InputImage extends Input
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'file',
            'groupable' => false,
            'accept' => 'image/*',
            'confirm' => 'Do you really want to remove this image?',
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'input-image\')',
                'x-init' => 'setup',
                'name' => $this->name,
                'label' => false,
                'show-errors' => $this->showErrors,
            ],

            'label-container' => [],

            'label' => [
                'class' => 'mb-1',
                'label' => $this->label
            ],

            'field' => [
                'class' => 'relative bg-white inline-block overflow-hidden border border-gray-200 rounded-lg shadow focus-within:ring',
            ],

            'input' => Attr::make(
                attributes: [
                    'x-ref' => 'input',
                '@change' => 'change',
                'class' => 'absolute opacity-0 w-full h-full -z-50',
                'type' => 'file',
                ],
            )
                ->when($this->name, fn ($attr, $value) => $attr->attr('name', $value))
                ->when($this->accept, fn ($attr, $value) => $attr->attr('accept', $value))
                ->when($this->id, fn ($attr, $value) => $attr->attr('id', $value))
                ->when(
                    $this->isModel() && $this->name,
                    fn ($attr) => $attr->attr('x-model' . $this->modelModifier($this->modifier), $this->modelName($this->name))
                )->when(
                    $this->isWired() && $this->name,
                    fn ($attr) => $attr->attr('wire:model' . $this->wireModifier($this->modifier), $this->name),
                ),

            'empty' => [
                'x-show' => 'isEmpty()',
                '@click.prevent' => 'edit',
                'class' => 'w-full h-full',
                'color' => 'none',
                'icon' => 'camera',

                'theme:icon-left' => [
                    'class' => 'inline-block w-6 h-6',
                ],
            ],

            'loading' => [
                'x-show' => 'isLoading()',
                'class' => 'w-full h-full flex items-center justify-center p-2',
            ],

            'loading-icon' => [
                'class' => 'animate-spin w-6 h-6 shadown',
                'name' => 'spinner'
            ],

            'error' => [
                'x-show' => 'isFailed()',
                '@click.prevent' => 'edit',
                'class' => 'w-full h-full',
                'color' => 'error',
                'icon' => 'close',

                'theme:icon-left' => [
                    'class' => 'inline-block w-6 h-6',
                ],
            ],

            'complete' => [
                'x-show' => 'isCompleted()',
                'class' => 'w-full h-full flex flex-col items-center justify-center',
            ],

            'img' => [
                'data-turbo-cache' => 'false',
                'data-turbolinks-cache' => 'false',
                'x-ref' => 'output',
                'class' => 'm-4 cursor-pointer max-w-sm max-h-80',
                'src' => $this->value
            ],

            'actions' => [
                'class' => 'w-full h-full flex items-center justify-center border-t p-2',
            ],

            'edit' => [
                '@click.prevent' => 'edit',
                'class' => 'transition transform hover:scale-125',
                'preset' => 'none',
                'icon' => 'pencil'
            ],

            'delete' => [
                'class' => 'transition transform hover:scale-125',
                'click' => 'remove(\''.__($this->confirm).'\')',
                'preset' => 'none',
                'icon' => 'delete',
            ],
        ];
    }
}
