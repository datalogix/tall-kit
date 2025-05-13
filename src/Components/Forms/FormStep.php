<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class FormStep extends BladeComponent
{
    protected array $props = [
        'mode' => 'horizontal',
        'active' => null,
        'completed' => null,
        'uncompleted' => null,
        'label' => null,
        'icon' => null,
        'title' => null,
        'subtitle' => null,
    ];

    protected function attrs()
    {
        return [
            'container' => Attr::make()
                ->when($this->active, fn($attr) => $attr->class('active'))
                ->when($this->completed, fn($attr) => $attr->class('completed'))
                ->when($this->uncompleted, fn($attr) => $attr->class('uncompleted'))
                ->when($this->mode === 'horizontal', fn($attr) => $attr->class('flex flex-1'))
                ->when($this->mode === 'vertical', fn($attr) => $attr->class('relative')),


            'step' => Attr::make(class: 'text-gray-400')
                ->when($this->mode === 'horizontal', fn($attr) => $attr->class('mx-1 md:mx-2'))
                ->when($this->mode === 'vertical', fn($attr) => $attr->class('flex space-x-2 items-start')),

            'pointer' => Attr::make(class: 'flex items-center justify-center h-8 w-8 rounded-full')
                ->when($this->mode === 'horizontal', fn($attr) => $attr->class('mx-auto mb-2'))
                ->when($this->active, fn($attr) => $attr->class('border-2 border-blue-500 text-blue-500'))
                ->when($this->completed, fn($attr) => $attr->class('bg-blue-500 text-white'))
                ->when($this->uncompleted, fn($attr) => $attr->class('border-2 border-gray-300')),

            'icon' => [],

            'content' => [
                'class' => Attr::make(class: 'flex-col')
                ->when($this->mode === 'horizontal', fn($attr) => $attr->class('hidden lg:flex'))
                ->when($this->mode === 'vertical', fn($attr) => $attr->class('flex'))
                ->when($this->active, fn($attr) => $attr->class('text-gray-500 font-semibold !flex'))
            ],

            'title' => [],

            'subtitle' => [
                'class' => 'text-sm',
            ],
        ];
    }
}
