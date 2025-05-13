<?php

namespace TALLKit\Components\Dropzone;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;

class Dropzone extends Input
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'file',
            'options' => [
                // See https://docs.dropzone.dev/configuration/basics/configuration-options
            ],
        ]);
    }

    protected function getOptionsValues()
    {
        return config('tallkit.options.upload.enabled')
            ? ['url' => route('tallkit.upload')]
            : [];
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'wire:ignore' => '',
                    'name' => $this->name,
                    'label' => $this->label,
                    'label-wrapper' => false,
                    'show-errors' => $this->showErrors,
                    'groupable' => $this->groupable,
                    'display' => false,
                    'icon' => $this->icon,
                    'icon-left' => $this->iconLeft,
                    'icon-right' => $this->iconRight,
                    'prepend' => $this->prepend,
                    'append' => $this->append,
                ],
                component: 'dropzone',
                setup: $this->jsonOptions()
            ),

            'loading' => Attr::make(
                attributes: ['x-show' => 'isLoading()'],
                class: 'w-full py-2 px-3',
            ),

            'dropzone' => Attr::make(
                attributes: [
                    'x-ref' => 'dropzone',
                    'x-show' => 'isCompleted()'
                ],
                class: 'dropzone'
            ),
        ];
    }
}
