<?php

namespace TALLKit\Components\CArd;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Card extends BladeComponent
{
    // TODO: review (add more styles)
    // color, size

    protected array $props = [
        'title' => null,
        'text' => null,
        'href' => null,
        'target' => null,
        'imageHeader' => null,
        'imageFooter' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'bg-white shadow rounded-lg overflow-hidden transition',
            ),

            'link' => Attr::make(class: 'block')
                ->when($this->href, fn ($attr, $value) => $attr->attr('href', $value))
                ->when($this->target, fn ($attr, $value) => $attr->attr('target', $value)),

            'image-header' => Attr::make(class: 'w-full h-32 rounded-t')
                ->when($this->imageHeader, fn ($attr, $value) => $attr->attr('src', asset($value))),

            'header' => Attr::make(
                class: 'px-8 py-4 bg-gray-50',
            ),

            'content' => Attr::make(
                class: 'block p-8',
            ),

            'title' => Attr::make(
                class: 'block mb-6 text-lg font-medium text-gray-900',
            ),

            'text' => Attr::make(),

            'footer' => Attr::make(
                class: 'px-8 py-4 bg-gray-50',
            ),

            'image-footer' => Attr::make(class: 'w-full h-32 rounded-b')
                ->when($this->imageFooter, fn ($attr, $value) => $attr->attr('src', asset($value))),
        ];
    }
}
