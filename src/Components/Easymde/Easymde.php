<?php

namespace TALLKit\Components\Easymde;

use TALLKit\Components\Forms\Textarea;
use TALLKit\Concerns\JsonOptions;

class Easymde extends Textarea
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'options' => [
                // See https://github.com/Ionaru/easy-markdown-editor#configuration
                'forceSync' => true,
            ]
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                ':class' => '{\'invisible\': !isCompleted()}',
                'x-ref' => 'editor',

                'pt' => [
                    'root' => [
                        'wire:ignore' => '',
                        'x-cloak' => '',
                        'x-data' => 'window.tallkit.component(\'easymde\')',
                        'x-init' => 'setup('.$this->jsonOptions().')',
                    ],
                ],
            ],

            'loading' => [
                'x-show' => 'isLoading()',
                'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded-lg shadow',
            ],
        ];
    }
}
