<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use TALLKit\Concerns\BoundValues;

class Checkbox extends Field
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
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  mixed  $value
     * @param  mixed  $bind
     * @param  bool  $default
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $label = '',
        $value = 1,
        $bind = null,
        $default = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($name, $label, $showErrors, $theme);

        $this->value = $value;

        $key = Str::before($this->name, '[]');

        if ($oldData = old($key)) {
            $this->checked = in_array($value, Arr::wrap($oldData));
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $key);

            $this->checked = is_null($boundValue)
                ? $default
                : in_array($value, Arr::wrap($boundValue));
        }
    }
}
