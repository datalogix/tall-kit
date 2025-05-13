<?php

namespace TALLKit\Components\Badge;

use TALLKit\Concerns\HasSetupColor;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Badge extends BladeComponent
{
    // TODO: review (styles)

    use HasSetupColor;

    protected array $props = [
        'text' => null,
        'type' => 'default',
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: [
                    'inline-block',
                    'px-2 py-1',
                    'rounded-full',
                    'text-sm text-white',
                    $this->colorClasses,
                ]
            ),
        ];
    }
}
