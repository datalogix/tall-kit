<?php

namespace TALLKit\Components\Uploaders;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;

abstract class Uploader extends Input
{
    use JsonOptions;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|bool|null  $language
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  bool|null  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
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
        $showErrors = null,
        $theme = null,
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null,
        $options = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'file',
            $bind,
            $default,
            null,
            null,
            null,
            $language,
            $showErrors,
            $theme,
            $groupable ?? true,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon,
            false
        );

        $this->setOptions($options);
    }
}
