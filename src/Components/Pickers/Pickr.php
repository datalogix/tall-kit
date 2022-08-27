<?php

namespace TALLKit\Components\Pickers;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;

class Pickr extends Input
{
    use JsonOptions;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  string|bool|null  $language
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  mixed  $options
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
        $options = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'hidden',
            $bind,
            $modifier,
            $default,
            null,
            null,
            null,
            $language,
            $showErrors,
            $theme
        );

        $this->setOptions($options);
    }

    /**
     * Get options values.
     *
     * @return array
     */
    protected function getOptionsValues()
    {
        return ['default' => $this->value];
    }
}
