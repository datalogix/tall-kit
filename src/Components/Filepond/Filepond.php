<?php

namespace TALLKit\Components\Filepond;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;

class Filepond extends Input
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'file',
            'options' => [
                // See https://pqina.nl/filepond/docs/api/instance/properties/

                'plugins' => [
                    // See https://pqina.nl/filepond/docs/api/plugins/
                ],
            ],
        ]);
    }

    protected function getOptionsValues()
    {
        $server = config('tallkit.options.upload.enabled')
            ? ['server' => ['url' => route('tallkit.upload')]]
            : [];

        return $server + [
            'labelIdle' => __('Drag & Drop your files or <span class="filepond--label-action"> Browse </span>'),
            'labelInvalidField' => __('Field contains invalid files'),
            'labelFileWaitingForSize' => __('Waiting for size'),
            'labelFileSizeNotAvailable' => __('Size not available'),
            'labelFileLoading' => __('Loading'),
            'labelFileLoadError' => __('Error during load'),
            'labelFileProcessing' => __('Uploading'),
            'labelFileProcessingComplete' => __('Upload complete'),
            'labelFileProcessingAborted' => __('Upload cancelled'),
            'labelFileProcessingError' => __('Error during upload'),
            'labelFileProcessingRevertError' => __('Error during revert'),
            'labelFileRemoveError' => __('Error during remove'),
            'labelTapToCancel' => __('tap to cancel'),
            'labelTapToRetry' => __('tap to retry'),
            'labelTapToUndo' => __('tap to undo'),
            'labelButtonRemoveItem' => __('Remove'),
            'labelButtonAbortItemLoad' => __('Abort'),
            'labelButtonRetryItemLoad' => __('Retry'),
            'labelButtonAbortItemProcessing' => __('Cancel'),
            'labelButtonUndoItemProcessing' => __('Undo'),
            'labelButtonRetryItemProcessing' => __('Retry'),
            'labelButtonProcessItem' => __('Upload'),
        ];
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
                component: 'filepond',
                setup: $this->jsonOptions()
            ),

            'loading' => Attr::make(
                attributes: ['x-show' => 'isLoading()'],
                class: 'w-full py-2 px-3',
            ),

            'filepond' => Attr::make(
                attributes: [
                    'x-ref' => 'filepond',
                    'type' => $this->type,
                    'x-show' => 'isCompleted()'
                ],
            )->when($this->name, fn ($attr, $value) => $attr->attr('name', $value))
            ->when($this->id, fn ($attr, $value) => $attr->attr('id', $value))
        ];
    }
}
