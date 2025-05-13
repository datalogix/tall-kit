<?php

namespace TALLKit\Components\Section;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Section extends BladeComponent
{
    // TODO: review (styles)

    protected array $props = [
        'title' => null,
        'subtitle' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(class: 'flex justify-between items-center'),

            'content' => Attr::make(),

            'header' => Attr::make(),

            'title' => Attr::make(class: 'text-lg font-medium text-gray-900'),

            'subtitle' => Attr::make(class: 'text-gray-500'),

            'actions' => Attr::make(class: 'shrink-0'),
        ];
    }
}
