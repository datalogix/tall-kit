<?php

namespace TALLKit\Components\Tab;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class TabItem extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'disabled' => false,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: ['role' => 'tabpanel'],
                class: 'p-4',
            )->when($this->disabled, fn ($attr) => $attr->attr('disabled', true))
        ];
    }
}
