<?php

namespace TALLKit\Components\Forms;

class FieldView extends Field
{
    /**
     * @var mixed
     */
    public $default;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var mixed
     */
    public $bind;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $value
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
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
        $value = null,
        $name = null,
        $label = null,
        $bind = null,
        $default = null,
        $showErrors = null,
        $theme = null,
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null,
    ) {
        parent::__construct(
            $name,
            $label,
            null,
            $showErrors,
            $theme,
            $groupable,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon,
            false,
        );

        $this->default = $default ?? '---';
        $this->value = $value;
        $this->bind = $bind ?? $this->getBoundTarget();
    }
}
