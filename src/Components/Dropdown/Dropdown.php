<?php

namespace TALLKit\Components\Dropdown;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Dropdown extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'show' => false,
        'overlay' => true,
        'closeable' => true,
        'align' => 'left'
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'show' => $this->show,
                    'overlay' => $this->overlay,
                    'closeable' => $this->closeable,
                ]
            ),

            'trigger' => Attr::make(
                attributes: ['@click' => 'toggle'],
                class: 'cursor-pointer',
            ),

            'dropdown' => Attr::make(
                attributes: [
                    'x-ref' => 'dropdown',
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'transition ease-out duration-300',
                    'x-transition:enter-start' => 'transform opacity-0 scale-95',
                    'x-transition:enter-end' => 'transform opacity-100 scale-100',
                    'x-transition:leave' => 'transition ease-in duration-200',
                    'x-transition:leave-start' => 'transform opacity-100 scale-100',
                    'x-transition:leave-end' => 'transform opacity-0 scale-95',
                    '@click.away' => 'close',
                    '@click.outside' => 'close',
                    '@keydown.escape.window' => 'close',
                ],
                class: 'absolute'
            )
            ->when($this->align === 'top', fn ($attr) => $attr->class('top-0'))
            ->when($this->align === 'left', fn ($attr) => $attr->class('left-0'))
            ->when($this->align === 'right', fn ($attr) => $attr->class('right-0'))
            ->when($this->align === 'bottom', fn ($attr) => $attr->class('bottom-0'))
            ->when($this->align === 'top-left', fn ($attr) => $attr->class('origin-top-left top-0 left-0'))
            ->when($this->align === 'top-right', fn ($attr) => $attr->class('origin-top-right top-0 right-0'))
            ->when($this->align === 'bottom-left', fn ($attr) => $attr->class('origin-bottom-left bottom-0 left-0'))
            ->when($this->align === 'bottom-right', fn ($attr) => $attr->class('origin-bottom-right bottom-0 right-0'))
        ];
    }
}
