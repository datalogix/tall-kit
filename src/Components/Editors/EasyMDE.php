<?php

namespace Datalogix\TALLKit\Components\Editors;

class EasyMDE extends Editor
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
        'easy-mde',
    ];

    /**
     * Convert array options to string.
     *
     * @return string
     */
    public function jsonOptions()
    {
        $options = array_merge([
            'forceSync' => true,
        ], $this->options);

        return ', ...'.json_encode((object) $options);
    }
}
