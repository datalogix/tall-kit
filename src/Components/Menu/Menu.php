<?php

namespace TALLKit\Components\Menu;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Menu extends BladeComponent
{
    protected array $props = [
        'items' => null,
        'inline' => false,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'items' => $this->items,
                    'inline' => $this->inline,
                ],
                class: 'bg-white ring-1 ring-black ring-opacity-5 divide-gray-100 rounded-lg shadow'
            )->when($this->inline, fn ($attr) => $attr->class('divide-x'), fn ($attr) => $attr->class('divide-y'))

                // TODO
                //'theme:item' => [
                //    'class' => 'hover:bg-gray-100 hover:text-gray-900',
                //
                //    'theme:active' => [
                //        'class' => 'bg-gray-100 text-gray-900',
                //    ],
                //],
        ];
    }
}
