<?php

namespace TALLKit\Components\Forms;

class Textarea extends Input
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  string|string|null  $language
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  bool|null  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $name = null,
        $id = null,
        $label = null,
        $bind = null,
        $modifier = null,
        $default = null,
        $language = null,
        $showErrors = null,
        $theme = null,
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'textarea',
            $bind,
            $modifier,
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
            $appendIcon
        );
    }
}
