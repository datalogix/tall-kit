<?php

namespace TALLKit\Components\Trix;

use TALLKit\Components\Forms\Textarea;

class Trix extends Textarea
{
    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'trix\')',
                'x-init' => 'setup',
                'x-on:trix-change' => 'change',
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
                'name' => $this->name,
                'id' => $this->id,
                'type' => 'hidden',
                'modifier' => $this->modifier,
            ],

            'editor' => [
                ':class' => '{\'invisible\': !isCompleted()}',
                'class' => 'trix-content block w-full border-gray-200 rounded-lg shadow bg-white',
                'input' => $this->id
            ],
        ];
    }
}
