<?php

namespace TALLKit\Components\Slider;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\BladeComponent;

class Slider extends BladeComponent
{
    use JsonOptions;

    protected array $props = [
        'options' => null,
        'selected' => 0,
        'loop' => false,
        'autoplay' => false,
        'interval' => 10,
        'controls' => true,
        'paginator' => true,
        'progressbar' => false,
        'stopOnOver' => false,
    ];

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'slider\')',
                'x-init' => 'setup('.$this->jsonOptions().')',
                '@mouseenter' => 'onMouseEnter',
                '@mouseleave' => 'onMouseLeave',
                'class' => 'relative',
            ],

            'slider' => [
                'x-ref' => 'slider',
                'class' => 'snap-mandatory snap-x scroll-smooth overflow-hidden relative flex-no-wrap flex transition-all',
            ],

            'prev-container' => [
                'class' => 'left-0 absolute top-0 h-full z-20  flex items-center justify-center',
                ':class' => 'prevClass()',
            ],

            'prev' => [
                'class' => 'opacity-50 hover:opacity-100',
                '@click' => 'prev',
                'preset' => 'none',
                'icon' => 'chevron-left'
            ],

            'next-container' => [
                'class' => 'right-0 absolute top-0 h-full z-20  flex items-center justify-center',
                ':class' => 'nextClass()',
            ],

            'next' => [
                'class' => 'opacity-50 hover:opacity-100',
                '@click' => 'next',
                'preset' => 'none',
                'icon' => 'chevron-right'
            ],

            'paginator' => [
                'x-show' => 'hasPaginator()',
                'class' => 'p-4 flex items-center justify-center space-x-2 absolute bottom-0 w-full z-10',
            ],

            'page' => [
                '@click' => 'go(index)',
                ':class' => '{ \'bg-opacity-100\': is(index) }',
                'class' => 'bg-opacity-25 p-2',
                'style' => 'padding: 0.5rem;',
                'rounded' => 'full',
            ],

            'progressbar' => [
                'x-show' => 'hasProgressbar()',
                ':style' => 'progressbarStyle()',
                'class' => 'bg-gray-100 h-2 max-w-full',
            ],
        ];
    }
}
