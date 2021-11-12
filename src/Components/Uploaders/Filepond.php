<?php

namespace TALLKit\Components\Uploaders;

class Filepond extends Uploader
{
    /**
     * Get options values.
     *
     * @return array
     */
    protected function getOptionsValues()
    {
        return [
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
}
