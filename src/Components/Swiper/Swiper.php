<?php

namespace TALLKit\Components\Swiper;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Swiper extends BladeComponent
{
    // TODO: review (JsonOptions)

    use JsonOptions;

    protected array $props = [
        // See https://swiperjs.com
        'options' => [
            'pagination' => [
                'el' => '.swiper-pagination',
            ],

            'navigation' => [
                'nextEl' => '.swiper-button-next',
                'prevEl' => '.swiper-button-prev',
            ],

            'scrollbar' => [
                'el' => '.swiper-scrollbar',
            ],
        ],
    ];

    protected function attrs()
    {
        return [
            'container' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'swiper',
                setup: $this->jsonOptions(),
                class: 'swiper',
            ),

            'wrapper' => Attr::make(
                class: 'swiper-wrapper',
            ),

            'pagination' => Attr::make(
                class: 'swiper-pagination',
            ),

            'button-prev' => Attr::make(
                class: 'swiper-button-prev',
            ),

            'button-next' => Attr::make(
                class: 'swiper-button-next',
            ),

            'scrollbar' => Attr::make(
                class: 'swiper-scrollbar',
            ),
        ];
    }
}
