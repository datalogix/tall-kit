<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class FieldError extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'bag' => 'default',
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(class: 'mt-1 text-red-600 text-sm italic'),
        ];
    }
}
