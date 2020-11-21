<?php

namespace Datalogix\TALLKit\Components\Pickers;

use Datalogix\TALLKit\Components\Forms\Input;

class Flatpickr extends Input
{
    /**
     * The assets of component.
     *
     * @var array
    */
    protected static $assets = [
        'alpine',
        'flatpickr',
    ];

    /**
     * The Flatpickr options.
     *
     * @var array
     */
    protected $options;

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
     * @param  string|null  $format
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
        $format = null,
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

        $this->format = $format ?: 'd/m/Y H:i';
        $this->options = $options;
    }

    /**
     * Convert array options to string.
     *
     * @return string
     */
    public function jsonOptions()
    {
        $options = array_merge([
            'enableTime' => true,
            'dateFormat' => $this->format,
        ], $this->options);


        return json_encode((object) $options);
    }
}
