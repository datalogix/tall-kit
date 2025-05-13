<?php

namespace TALLKit\Components\Loading;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Loading extends BladeComponent
{
    protected array $props = [
        'text' => 'Loading',
        'icon' => 'spinner',
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'justify-center inline-flex items-center space-x-2'
            ),

            'icon' => Attr::make(
                class: 'animate-spin w-4 h-4',
                attributes: ['name' => $this->icon]
            ),

            'text' => Attr::make(),
        ];
    }
}
