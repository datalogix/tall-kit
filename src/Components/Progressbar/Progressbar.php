<?php

namespace TALLKit\Components\Progressbar;

use TALLKit\Concerns\HasSetupColor;
use TALLKit\Concerns\HasSetupRounded;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Progressbar extends BladeComponent
{
    // TODO: review (styles)

    use HasSetupRounded;
    use HasSetupColor;

    protected array $packs = [
        'size',
        'duration'
    ];

    protected array $props = [
        'value' => 0,
        'min' => 0,
        'max' => 100,
        'showValue' => true,
    ];

    protected function attrs(): array
    {
        return [
            'root' => Attr::make(
                component: 'progressbar',
                setup: [$this->value, $this->min, $this->max]
            ),

            'bar' => Attr::make(
                class: [
                    'bg-gray-200',
                    $this->sizeClasses,
                    $this->roundedClasses
                ]
            ),

            'progress' => Attr::make(
                attributes: [
                    ':style' => 'style()',
                    'x-text' => $this->showValue ? '`${value}%`' : ''
                ],
                class: [
                    'text-center',
                    'text-white',
                    $this->sizeClasses,
                    $this->roundedClasses,
                    $this->colorClasses,
                    $this->durationClasses
                ]
            ),
        ];
    }
}
