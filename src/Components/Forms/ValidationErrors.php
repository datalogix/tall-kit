<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\Message\Message;
use TALLKit\View\Attr;

class ValidationErrors extends Message
{
    protected array $props = [
        'bag' => 'default',
        'title' => 'Whoops! Something went wrong.',
    ];

    protected function attrs()
    {
        return [
            'message' => Attr::make(attributes: ['type' => 'danger']),

            'root' => Attr::make(class: 'mb-4'),

            'title' => Attr::make(class: 'font-medium text-red-600'),

            'ul' => Attr::make(class: 'mt-3 list-disc list-inside text-sm text-red-600'),

            'li' => Attr::make(),
        ];
    }
}
