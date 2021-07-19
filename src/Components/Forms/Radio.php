<?php

namespace TALLKit\Components\Forms;

class Radio extends Field
{
    /**
     * @var mixed
     */
    public $value;

    /**
     * @var bool
     */
    public $checked = false;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  mixed  $value
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $value = 1,
        $bind = null,
        $default = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme
        );

        $this->value = $value;

        if ($oldData = $this->oldFieldValue()) {
            $this->checked = $oldData == $this->value;
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getFieldBoundValue($bind);

            $this->checked = is_null($boundValue)
                ? $default
                : $boundValue == $this->value;
        }
    }
}
