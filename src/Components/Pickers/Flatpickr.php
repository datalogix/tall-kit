<?php

namespace TALLKit\Components\Pickers;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;

class Flatpickr extends Input
{
    use JsonOptions;

    /**
     * @var string
     */
    public $format;

    /**
     * @var string|bool|null
     */
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  string|bool|null  $language
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  bool|null  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @param  string  $format
     * @param  string|bool|null  $placeholder
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
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null,
        $format = null,
        $placeholder = null,
        $options = null
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'text',
            $bind,
            $modifier,
            $default,
            null,
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

        $this->format = $format ?? __('m/d/Y H:i');
        $this->placeholder = $placeholder;
        $this->setOptions($options);
    }

    /**
     * Get options values.
     *
     * @return array
     */
    protected function getOptionsValues()
    {
        return ['dateFormat' => $this->format];
    }
}
