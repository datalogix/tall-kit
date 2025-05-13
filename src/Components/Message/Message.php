<?php

namespace TALLKit\Components\Message;

use TALLKit\View\BladeComponent;

class Message extends BladeComponent
{
    protected array $props = [
        'session' => null,
        'color' => null,
        'type' => 'info',
        'mode' => 'default',
        'rounded' => 'default',
        'shadow' => 'default',
        'icon' => null,
        'timeout' => null,
        'dismissible' => null,
        'title' => null,
        'message' => null,
        'on' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => [
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'message\')',
                'x-show' => 'isOpened()',
                'x-transition:enter' => 'ease-out duration-300',
                'x-transition:enter-start' => 'opacity-0',
                'x-transition:enter-end' => 'opacity-100',
                'x-transition:leave' => 'ease-in duration-200',
                'x-transition:leave-start' => 'opacity-100',
                'x-transition:leave-end' => 'opacity-0',
                'class' => 'flex flex-row p-4 rounded-lg relative transition mb-4'.($this->mode !== 'outlined' ? 'bg-'.$this->color.'-200 ' : '').'border-'.$this->color.'-300',
                'x-init' => 'setup(\''.$this->on.'\', '.$this->timeout.')'
            ],

            'icon-container' => [
                'class' => 'flex items-center border-2 justify-center h-10 w-10 shrink-0 rounded-full mr-4 bg-'.$this->color.'-100 border-'.$this->color.'-500 text-'.$this->color.'-500',
            ],

            'icon' => [
                'class' => 'w-6 h-6 fill-current',
                'name' => $this->icon
            ],

            'dismissible' => [
                'preset' => 'none',
                '@click' => 'close',
                'class' => 'absolute top-0 right-0 transition hover:opacity-75 text-sm',
                'icon' => 'close',
                'pt' => ['icon-left' => 'w-4 h-4 fill-current']
            ],

            'title' => [
                'class' => 'font-semibold text-lg text-'.$this->color.'-800',
            ],

            'message' => [
                'class' => 'text-'.$this->color.'-600',
            ],

            'types' => [
                'default' => [
                    'color' => 'gray',
                    'icon' => false,
                    'title' => false,
                ],

                'danger' => [
                    'color' => 'red',
                    'icon-name' => 'close',
                    'title' => 'Error',
                ],

                'error' => [
                    'color' => 'red',
                    'icon-name' => 'close',
                    'title' => 'Error',
                ],

                'info' => [
                    'color' => 'blue',
                    'icon-name' => 'information',
                    'title' => 'Info',
                ],

                'success' => [
                    'color' => 'green',
                    'icon-name' => 'check',
                    'title' => 'Success',
                ],

                'ok' => [
                    'color' => 'green',
                    'icon-name' => 'check',
                    'title' => 'Success',
                ],

                'warning' => [
                    'color' => 'yellow',
                    'icon-name' => 'alert',
                    'title' => 'Warning',
                ],

                'warn' => [
                    'color' => 'yellow',
                    'icon-name' => 'alert',
                    'title' => 'Warning',
                ],

                'created' => [
                    'color' => 'green',
                    'icon-name' => 'check',
                    'title' => 'Created',
                    'message' => 'Record created successfully!',
                    'dismissible' => true,
                    'timeout' => true,
                ],

                'updated' => [
                    'color' => 'blue',
                    'icon-name' => 'check',
                    'title' => 'Updated',
                    'message' => 'Record updated successfully!',
                    'dismissible' => true,
                    'timeout' => true,
                ],

                'deleted' => [
                    'color' => 'red',
                    'icon-name' => 'check',
                    'title' => 'Deleted',
                    'message' => 'Record deleted successfully!',
                    'dismissible' => true,
                    'timeout' => true,
                ],
            ],

            'modes' => [
                'default' => [
                    'class' => 'border-2',
                ],

                'top' => [
                    'class' => 'border-t-2',
                ],

                'bottom' => [
                    'class' => 'border-b-2',
                ],

                'left' => [
                    'class' => 'border-l-2',
                ],

                'right' => [
                    'class' => 'border-r-2',
                ],

                'banner' => [
                    'class' => 'border-t-2 border-b-2',
                ],

                'outlined' => [
                    'class' => 'border-2 bg-transparent',
                ],
            ],

            'roundeds' => [
                'default' => [
                    'class' => 'rounded',
                ],

                'sm' => [
                    'class' => 'rounded-sm',
                ],

                'md' => [
                    'class' => 'rounded-md',
                ],

                'lg' => [
                    'class' => 'rounded-lg',
                ],

                'full' => [
                    'class' => 'rounded-full',
                ],
            ],

            'shadows' => [
                'default' => [
                    'class' => 'shadow',
                ],

                'xs' => [
                    'class' => 'shadow-xs',
                ],

                'sm' => [
                    'class' => 'shadow-sm',
                ],

                'md' => [
                    'class' => 'shadow-md',
                ],

                'lg' => [
                    'class' => 'shadow-lg',
                ],

                'xl' => [
                    'class' => 'shadow-xl',
                ],

                '2xl' => [
                    'class' => 'shadow-2xl',
                ],

                'inner' => [
                    'class' => 'shadow-inner',
                ],

                'outline' => [
                    'class' => 'shadow-outline',
                ],

                'none' => [
                    'class' => 'shadow-none',
                ],
            ],
        ];
    }
}
