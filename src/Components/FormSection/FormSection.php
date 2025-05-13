<?php

namespace TALLKit\Components\FormSection;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class FormSection extends BladeComponent
{
    // TODO: review (styles)

    protected array $props = [
        'title' => null,
        'subtitle' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(class: 'lg:grid lg:grid-cols-3 lg:gap-6'),

            'section' =>  Attr::make(class: 'lg:col-span-1'),

            'title' => Attr::make(
                attributes: [
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                ]
            ),

            'form' => Attr::make(class: 'mt-5 lg:mt-0 lg:col-span-2'),

            'card' => Attr::make(),
        ];
    }
}
