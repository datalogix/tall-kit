<?php

namespace TALLKit\Components\Tinymce;

use TALLKit\Components\Forms\Textarea;
use TALLKit\Concerns\JsonOptions;

class Tinymce extends Textarea
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
           'options' => [
                'hidden_input' => false,
                'branding' => false,
                'menubar' => false,
                'language' => app()->getLocale(),
                'plugins' => [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount',
                    'autoresize', 'autosave', 'codesample', 'directionality', 'emoticons', 'nonbreaking',
                    'pagebreak', 'visualchars',
                ],
                'toolbar' => 'undo redo | blocks | bold italic
                    | forecolor backcolor
                    | alignleft aligncenter alignright alignjustify
                    | bullist numlist | image media | table | link
                    | preview | code | removeformat | fullscreen',
            ] + (config('tallkit.options.upload.enabled') ? [
                'upload_url' => route('tallkit.upload'),
                'images_upload_url' => route('tallkit.upload'),
                'file_picker_types' => 'file image media',
            ] : []),
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'tinymce\')',
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
                ':class' => '{\'invisible\': !isCompleted()}',
                'x-ref' => 'editor',
            ],
        ];
    }
}
