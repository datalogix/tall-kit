<?php

namespace TALLKit\Components\Sidebar;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Sidebar extends BladeComponent
{
    protected array $props = [
        'items' => [],
        'breakpoint' => 'none',
        'target' => null,
        'name' => 'sidebar',
        'show' => false,
        'overlay' => true,
        'closeable' => true,
        'align'=> 'left'
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(attributes: [
                'name' => $this->name,
                'show' => $this->show,
                'overlay' => $this->overlay,
                'closeable' => $this->closeable,
                'align' => $this->align,
            ], pt: [
                'root' => [
                        'wire:ignore' => '',
                        'x-cloak' => '',
                        'x-data' => 'window.tallkit.component(\'sidebar\')',
                        '@resize.window' => 'check',
                        'x-init' => 'setup(\''.$this->name.'\', \''.$this->breakpoint.'\')',
                    ],

                    'overlay' => Attr::make()
                        ->when($this->breakpoint === 'sm', fn ($attr) => $attr->class('sm:hidden'))
                        ->when($this->breakpoint === 'md', fn ($attr) => $attr->class('md:hidden'))
                        ->when($this->breakpoint === 'lg', fn ($attr) => $attr->class('lg:hidden'))
                        ->when($this->breakpoint === 'xl', fn ($attr) => $attr->class('xl:hidden'))
                        ->when($this->breakpoint === '2xl', fn ($attr) => $attr->class('2xl:hidden'))
                ]
            )->when($this->breakpoint === 'sm', fn ($attr) => $attr->attr(':class', '{ \'sm:static\': isOpened() }'))
            ->when($this->breakpoint === 'md', fn ($attr) => $attr->attr(':class', '{ \'md:static\': isOpened() }'))
            ->when($this->breakpoint === 'lg', fn ($attr) => $attr->attr(':class', '{ \'lg:static\': isOpened() }'))
            ->when($this->breakpoint === 'xl', fn ($attr) => $attr->attr(':class', '{ \'xl:static\': isOpened() }'))
            ->when($this->breakpoint === '2xl', fn ($attr) => $attr->attr(':class', '{ \'2xl:static\': isOpened() }')),

            'nav' => [
                'class' => 'h-full bg-gray-700 overflow-y-auto',
            ],

            'ul' => [
                'items' => $this->items,
                'inline' => false,
                'pt' => [
                    'item' => Attr::make(pt: ['active' => Attr::make()->class('bg-black/25 hover:bg-black/25 bg-black bg-opacity-25 hover:bg-opacity-25')])
                    ->class('text-gray-100 !py-4 py-4 !px-6 px-6 hover:bg-black/10 hover:bg-black hover:bg-opacity-10')
                    ->style('padding: 1rem 1.5rem;')
                    ->when($this->target, fn ($attr, $value) => $attr->attr('target', $value)),
                ]
            ],

            'trigger' => [
                'x-data' => '',
                'class' => 'cursor-pointer',
                '@click' => '$dispatch(\''.$this->name.'-toggle\')',
            ],
        ];
    }
}
