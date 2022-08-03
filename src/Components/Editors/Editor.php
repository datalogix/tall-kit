<?php

namespace TALLKit\Components\Editors;

use Illuminate\Support\Str;

class Editor extends BaseEditor
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

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions(...$args)
    {
        $editor = app(__NAMESPACE__.'\\'.Str::ucfirst($this->getComponentKey()));

        return $editor->jsonOptions(...$args);
    }
}
