<?php

namespace TALLKit\Components\Editors;

use TALLKit\Components\Forms\Textarea;
use TALLKit\Concerns\JsonOptions;

abstract class Editor extends Textarea
{
    use JsonOptions;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  mixed  $options
     * @return void
     */
    public function __construct(
        $name = null,
        $id = null,
        $label = null,
        $bind = null,
        $default = null,
        $language = null,
        $showErrors = true,
        $theme = null,
        $options = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            $bind,
            $default,
            $language,
            $showErrors,
            $theme,
            false
        );

        $this->setOptions($options);
    }
}
