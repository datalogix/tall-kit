<?php

namespace TALLKit\Components\Error;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Error extends BladeComponent
{
    // TODO: review (size), other name - ErrorLabel?

    protected array $props = [
        'text' => 'Error',
        'icon' => 'close',
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'justify-center inline-flex items-center space-x-2'
            ),

            'icon' => Attr::make(
                class: 'fill-current w-4 h-4 text-red-500',
                attributes: ['name' => $this->icon]
            ),

            'text' => Attr::make(),
        ];
    }
}
