<?php

namespace Datalogix\TALLKit\Components\Editors;

class Quill extends Editor
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
        'quill',
    ];

    /**
     * Convert array options to string.
     *
     * @return string
     */
    public function jsonOptions()
    {
        $options = array_merge([
            'theme' => 'snow',
        ], $this->options);

        return json_encode((object) $options);
    }
}
