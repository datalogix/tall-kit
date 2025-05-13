<?php

namespace TALLKit\Components\Fetchable;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Fetchable extends BladeComponent
{
    use JsonOptions;

    protected array $props = [
        'url' => null,
        'data' => null,
        'autoload' => true,
        'options' => [
            'method' => 'get',
            'headers' => ['Accept' => 'application/json'],
            'responseType' => 'json',
        ],
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'fetchable',
                setup: [$this->url, json_encode((object) $this->data), $this->autoload, $this->jsonOptions()],
                class: 'flex flex-col'
            ),

            'content' => Attr::make(
                class: 'flex-1',
            ),

            'empty' => Attr::make(
                attributes: ['x-show' => 'isEmpty()'],
            ),

            'loading' => Attr::make(
                attributes: ['x-show' => 'isLoading()'],
            ),

            'completed' => Attr::make(
                attributes: ['x-show' => 'isCompleted()'],
            ),

            'error' => Attr::make(
                attributes: ['x-show' => 'isFailed()'],
                pt: [
                    'text' => [
                        'x-text' => 'error',
                    ]
                ]
            ),

            'json' => Attr::make(
                attributes: ['x-init' => 'setup(data)']
            ),
        ];
    }
}
