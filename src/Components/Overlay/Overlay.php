<?php

namespace TALLKit\Components\Overlay;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Overlay extends BladeComponent
{
    // TODO: review (styles)

    protected array $props = [
        'closeable' => true
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                ],
                class: 'fixed inset-0 transform transition',
            )
            ->cloak()
            ->when($this->closeable, fn ($attr) => $attr->class('cursor-pointer')->attr('@click', 'close(false)')),

            'backdrop' => Attr::make(
                class: 'absolute inset-0 bg-gray-500 opacity-70',
            ),
        ];
    }
}
