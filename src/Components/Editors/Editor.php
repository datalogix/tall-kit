<?php

namespace TALLKit\Components\Editors;

class Editor extends AbstractEditor
{
    /**
     * Get component key.
     *
     * @return string
     */
    protected function getComponentKey()
    {
        return $this->provider ?? 'tinymce';
    }
}
