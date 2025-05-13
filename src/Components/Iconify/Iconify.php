<?php

namespace TALLKit\Components\Iconify;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Iconify extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'icon' => null,
    ];

    protected function processed($data)
    {
        $this->name = $this->name ?? $this->icon;
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'iconify',
                setup: true
            )
        ];
    }
}
