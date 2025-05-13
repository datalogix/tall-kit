<?php

namespace TALLKit\Components\Highlight;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Highlight extends BladeComponent
{
    protected array $props = [
        'code' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'highlight',
                setup: true,
            ),

            'loading' => Attr::make(
                attributes: [
                    'x-show' => 'isLoading()'
                ],
            ),

            'highlight' => Attr::make(
                class: 'whitespace-pre',
                attributes: [
                    'x-show' => 'isCompleted()',
                    'x-ref' => 'highlight'
                ],
            ),
        ];
    }
}
