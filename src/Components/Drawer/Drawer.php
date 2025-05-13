<?php

namespace TALLKit\Components\Drawer;

use TALLKit\View\BladeComponent;

class Drawer extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'show' => false,
        'overlay' => true,
        'closeable' => true,
        'align'=> 'left'
    ];

    protected function attrs()
    {
        return [
            'root' => [
                'name' => $this->name,
                'show' => $this->show,
                'overlay' => $this->overlay,
                'closeable' => $this->closeable,
            ],

            'drawer' => [
                'x-show' => 'isOpened()',
                'x-transition:enter' => 'ease-out duration-300',
                'x-transition:leave' => 'ease-in duration-200',

                'class' => 'fixed transform transition '.
                    ($this->align === 'left' ? 'h-full top-0 bottom-0 left-0 overflow-y-auto' : '').
                    ($this->align === 'right' ? 'h-full top-0 bottom-0 right-0 overflow-y-auto' : '').
                    ($this->align === 'top' ? 'w-full top-0 left-0 right-0 overflow-x-auto' : '').
                    ($this->align === 'bottom' ? 'w-full bottom-0 left-0 right-0 overflow-x-auto' : '').
                    '',
            ]
                +
                ($this->align === 'left' ? [
                    'x-transition:enter-start' => '-translate-x-full',
                    'x-transition:enter-end' => 'translate-x-0',
                    'x-transition:leave-start' => 'translate-x-0',
                    'x-transition:leave-end' => '-translate-x-full',
                ] : [])

                +
                ($this->align === 'right' ? [
                    'x-transition:enter-start' => 'translate-x-full',
                    'x-transition:enter-end' => 'translate-x-0',
                    'x-transition:leave-start' => 'translate-x-0',
                    'x-transition:leave-end' => 'translate-x-full',
                ] : [])

                +
                ($this->align === 'top' ? [
                    'x-transition:enter-start' => '-translate-y-full',
                    'x-transition:enter-end' => 'translate-y-0',
                    'x-transition:leave-start' => 'translate-y-0',
                    'x-transition:leave-end' => '-translate-y-full',
                ] : [])

                +
                ($this->align === 'bottom' ? [
                    'x-transition:enter-start' => 'translate-y-full',
                    'x-transition:enter-end' => 'translate-y-0',
                    'x-transition:leave-start' => 'translate-y-0',
                    'x-transition:leave-end' => 'translate-y-full',
                ] : []),
        ];
    }
}
