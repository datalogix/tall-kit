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
    public $checked;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  mixed  $value
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $value = null,
        $bind = null,
        $modifier = null,
        $default = null,
        $showErrors = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $modifier,
            $showErrors,
            $theme
        );

        $this->value = $value ?? 1;
        $this->checked = false;

        if ($oldData = $this->oldFieldValue()) {
            $this->checked = $oldData == $this->value;
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getFieldBoundValue($bind);

            $this->checked = is_null($boundValue)
                ? ($default ?? false)
                : $boundValue == $this->value;
        }
    }
}
