<?php

namespace TALLKit\Components\Uploaders;

class Dropzone extends Uploader
{
    /**
     * Get options values.
     *
     * @return array
     */
    protected function getOptionsValues()
    {
        if (! config('tallkit.options.upload.enabled')) {
            return [];
        }

        return [
            'url' => route('tallkit.upload'),
        ];
    }
}
