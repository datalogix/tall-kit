<?php

namespace TALLKit\Components\Editors;

class Tinymce extends Editor
{
    /**
     * Get options values.
     *
     * @return array
     */
    protected function getOptionsValues()
    {
        if (!config('tallkit.options.upload.enabled')) {
            return [];
        }

        return [
            'upload_url' => route('tallkit.upload'),
            'images_upload_url' => route('tallkit.upload'),
            'file_picker_types' => 'file image media',
        ];
    }
}
