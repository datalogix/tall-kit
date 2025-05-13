<?php

namespace TALLKit\Components\Accordion;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class AccordionItem extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'open' => false,
        'disabled' => false,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'accordion-item',
                setup: $this->open,
                class: 'border-b',
                attributes: ['wire:ignore' => ''],
            ),

            'trigger' => Attr::make(
                class: 'w-full text-left py-2 px-3 cursor-pointer',
                attributes: ['@click' => 'toggle']
            )->when($this->disabled, fn ($attr) => $attr->class('cursor-not-allowed')->attr('disabled', true)),

            'item' => Attr::make(
                class: 'overflow-hidden transition-all max-h-0 duration-500',
                attributes: [
                    'x-ref' => 'container',
                    ':style' => 'style()',
                ]
            ),

            'content' => Attr::make(
                class: 'py-2 px-3',
            ),
        ];
    }
}
