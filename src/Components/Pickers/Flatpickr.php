<?php

namespace TALLKit\Components\Pickers;

use TALLKit\Components\Forms\Input;

class Flatpickr extends Input
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
     * @param  string  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  string  $format
     * @param  string|bool|null  $placeholder
     * @param  array  $options
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
        $theme = null,
        $format = 'd/m/Y H:i',
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
            false,
            $language,
            $showErrors,
            $theme
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
        return json_encode((object) array_merge([
            'enableTime' => true,
            'dateFormat' => $this->format,
        ], $this->options));
    }
}
