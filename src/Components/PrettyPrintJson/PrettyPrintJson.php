<?php

namespace TALLKit\Components\PrettyPrintJson;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class PrettyPrintJson extends BladeComponent
{
    protected array $props = [
        'code' => null,
    ];

    protected function attrs(): array
    {
        return [
            'root' => Attr::make(
                component: 'pretty-print-json',
                setup: json_encode((object) $this->code),
            ),

            'loading' => Attr::make(
                attributes: [
                    'x-show' => 'isLoading()'
                ],
            ),

            'pretty-print-json' => Attr::make(
                class: 'json-container',
                attributes: [
                    'x-show' => 'isCompleted()',
                    'x-ref' => 'prettyPrintJson'
                ],
            ),
        ];
    }
}
