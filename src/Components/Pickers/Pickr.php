<?php

namespace TALLKit\Components\Pickers;

use TALLKit\Components\Forms\Input;

class Pickr extends Input
{
    /**
     * @var array
     */
    public $options;

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
     * @param  array  $options
     * @param  string|null  $theme
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
        $options = [],
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
            ['default' => $this->value],
            $this->themeProvider->options->getAttributes(),
            $this->options
        ));
    }
}
