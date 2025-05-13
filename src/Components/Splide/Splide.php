<?php

namespace TALLKit\Components\Splide;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Splide extends BladeComponent
{
    // TODO: review (JsonOptions)
    use JsonOptions;

    protected array $props = [
        // See https://splidejs.com/options/
        'options' => [],
        'relative' => false,
    ];

    protected function attrs()
    {
        return [
            'container' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'splide',
                setup: $this->jsonOptions(),
                class: 'splide',
            ),

            'slider' => Attr::make(
                class: 'splide__slider',
            ),

            'track' => Attr::make(
                class: 'splide__track',
            ),

            'list' => Attr::make(
                class: 'splide__list',
            ),
        ];
    }
}
