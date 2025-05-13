<?php

namespace TALLKit\Components\Quill;

use TALLKit\Components\Forms\Textarea;
use TALLKit\Concerns\JsonOptions;

class Quill extends Textarea
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'options' => [
                // See https://quilljs.com/docs/configuration/#options
                'modules' => [
                    'toolbar' => [
                        [['size' => ['small', false, 'large', 'huge']]],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [['list' => 'ordered'], ['list' => 'bullet'], ['align' => []]],
                        ['link', 'image', 'video'],
                        [['script' => 'sub'], ['script' => 'super']],
                        [['indent' => '-1'], ['indent' => '+1']],
                        [['direction' => 'rtl']],
                        [['color' => []], ['background' => []]],
                        ['clean'],
                    ],
                ],
                'theme' => 'snow',
            ],
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'quill\')',
                'x-init' => 'setup('.$this->jsonOptions().')',
                'name' => $this->name,
                'label' => false,
                'show-errors' => $this->showErrors
            ],

            'label-container' => [
                'class' => 'block',
            ],

            'label' => [
                'class' => 'mb-1',
                'label' => $this->label
            ],

            'loading' => [
                'x-show' => 'isLoading()',
                'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded-lg shadow',
            ],

            'input' => [
                'x-ref' => 'input',
                'name' => $this->name,
                'id' => $this->id,
                'type' => 'hidden',
                'modifier' => $this->modifier
            ],

            'editor' => [
                'x-ref' => 'editor',
                ':class' => '{\'invisible\': !isCompleted()}',
                'class' => 'quill-container bg-white',
            ],
        ];
    }
}
