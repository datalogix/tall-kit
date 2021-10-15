<?php

namespace TALLKit\Components\Pickers;

use TALLKit\Components\Forms\Input;

class Pikaday extends Input
{
    /**
     * @var string
     */
    public $format;

    /**
     * @var string|bool|null
     */
    public $placeholder;

    /**
     * @var array
     */
    public $options;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  bool  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @param  string  $format
     * @param  string|bool|null  $placeholder
     * @param  array  $options
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
        $groupable = true,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null,
        $format = 'DD/MM/YYYY',
        $placeholder = null,
        $options = []
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'text',
            $bind,
            $default,
            null,
            null,
            null,
            $language,
            $showErrors,
            $theme,
            $groupable,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->format = $format;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions()
    {
        return json_encode((object) array_replace_recursive(
            ['format' => $this->format],
            $this->themeProvider->options->getAttributes(),
            $this->options
        ));
    }
}
