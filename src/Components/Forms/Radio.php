<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\BoundValues;

class Radio extends Field
{
    use BoundValues;

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

        if (old($this->name)) {
            $this->checked = old($this->name) == $value;
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $this->name) ?? $default;

            $this->checked = $boundValue == $this->value;
        }
    }
}
