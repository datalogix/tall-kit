<?php

namespace TALLKit\Components\Nav;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Nav extends BladeComponent
{
    protected array $props = [
        'items' => null,
        'inline' => true,
    ];

    protected function attrs(): array
    {
        return [
            'root' => Attr::make(class: 'flex overflow-hidden whitespace-nowrap')
                ->when($this->inline, fn ($attr) => $attr->class('flex-row'))
                ->unless($this->inline, fn ($attr) => $attr->class('flex-col')),

            'li' => Attr::make(),

            'item' => Attr::make(
                class: 'w-full',
                pt: [
                    'root' => Attr::make(class: 'w-full'),
                    'active' => Attr::make(class: 'font-semibold'),
                ]
            ),
        ];
    }
}
