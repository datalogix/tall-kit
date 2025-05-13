<?php

namespace TALLKit\Components\Table;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Cell extends BladeComponent
{
    protected array $props = [
        'text' => null,
        'align' => 'left'
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'px-6 py-4 whitespace-nowrap text-gray-500',
            ),

            'content' => Attr::make()
                ->when($this->align === 'left', fn($attr) => $attr->class('text-left'))
                ->when($this->align === 'center', fn($attr) => $attr->class('text-center'))
                ->when($this->align === 'right', fn($attr) => $attr->class('text-right')),
        ];
    }
}
