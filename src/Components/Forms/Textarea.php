<?php

namespace Datalogix\TALLKit\Components\Forms;

class Textarea extends Input
{
    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $id = null,
        $label = '',
        $bind = null,
        $default = null,
        $language = null,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'hidden',
            $bind,
            $default,
            false,
            $language,
            $showErrors,
            $theme
        );
    }
}
