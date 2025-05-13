<?php

namespace TALLKit\Components\Tooltip;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Tooltip extends BladeComponent
{
    // TODO: review (JsonOptions)
    use JsonOptions;

    protected array $props = [
        'value' => null,
        'options' => [
            // See https://atomiks.github.io/tippyjs/v6/all-props/
        ],
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'tooltip',
                setup: $this->jsonOptions(__($this->value ?? 'Content of tooltip')),
                class: 'inline-block'
            )
        ];
    }
}
