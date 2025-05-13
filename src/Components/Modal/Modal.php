<?php

namespace TALLKit\Components\Modal;

use TALLKit\View\BladeComponent;

class Modal extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'show' => false,
        'overlay' => true,
        'closeable' => true,
        'align' => 'center',
        'transition' => 'opacity'
    ];

    protected function attrs()
    {
        return [
            'root' => [
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'modal\')',
                'x-init' => 'setup('.$this->show.')',
                '@'.$this->name.'-open.window' => 'open',
                '@'.$this->name.'-close.window' => 'close',
                '@'.$this->name.'-toggle.window' => 'toggle',
            ],

            'box' => [
                'x-show' => 'isOpened()',
                '@close.stop' => 'close',
                '@keydown.escape.window' => 'close',
                '@keydown.tab.prevent' => '$event.shiftKey || nextFocusable().focus()',
                '@keydown.shift.tab.prevent' => 'prevFocusable().focus()',
                'class' => 'fixed inset-0 z-50 p-4 flex '.
                    ($this->align === 'left' ? 'items-center justify-start' : '').
                    ($this->align === 'right' ? 'items-center justify-end' : '').
                    ($this->align === 'top' ? 'items-start justify-center' : '').
                    ($this->align === 'top-left' ? 'items-start justify-start' : '').
                    ($this->align === 'top-right' ? 'items-start justify-end' : '').
                    ($this->align === 'center' ? 'items-center justify-center' : '').
                    ($this->align === 'bottom' ? 'items-end justify-center' : '').
                    ($this->align === 'bottom-left' ? 'items-end justify-start' : '').
                    ($this->align === 'bottom-right' ? 'items-end justify-end' : '').
                    '',
            ],

            'overlay' => [
                'closeable' => $this->closeable
            ],

            'modal' => [
                'x-show' => 'isOpened()',
                'x-transition:enter' => 'ease-out duration-300',
                'x-transition:leave' => 'ease-in duration-200',
                'class' => 'flex-initial bg-white overflow-hidden rounded-lg shadow transform transition w-full',
            ] +
            (
                $this->transition === 'opacity' ? [
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',

                ] : []
            )
            +
            (
                $this->transition === 'left' ? [
                    'x-transition:enter-start' => '-translate-x-full',
                    'x-transition:enter-end' => 'translate-x-0',
                    'x-transition:leave-start' => 'translate-x-0',
                    'x-transition:leave-end' => '-translate-x-full',
                ] : []
            )
            +
            (
                $this->transition === 'right' ? [
                    'x-transition:enter-start' => 'translate-x-full',
                    'x-transition:enter-end' => 'translate-x-0',
                    'x-transition:leave-start' => 'translate-x-0',
                    'x-transition:leave-end' => 'translate-x-full',
                ] : []
            )
            +
            (
                $this->transition === 'top' ? [
                    'x-transition:enter-start' => '-translate-y-full',
                    'x-transition:enter-end' => 'translate-y-0',
                    'x-transition:leave-start' => 'translate-y-0',
                    'x-transition:leave-end' => '-translate-y-full',
                ] : []
            )
            +
            (
                $this->transition === 'bottom' ? [
                    'x-transition:enter-start' => 'translate-y-full',
                    'x-transition:enter-end' => 'translate-y-0',
                    'x-transition:leave-start' => 'translate-y-0',
                    'x-transition:leave-end' => 'translate-y-full',
                ] : []
            ),

            'trigger' => [
                '@click' => 'toggle',
                'class' => 'inline-block cursor-pointer',
            ],
        ];
    }
}
