<?php

namespace TALLKit\Components\Forms;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Checkbox extends Field
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
     * @param  bool|null  $default
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $value = null,
        $bind = null,
        $default = null,
        $showErrors = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme
        );

        $this->value = $value ?? 1;
        $this->checked = false;

        if ($oldData = $this->oldFieldValue()) {
            $this->checked = in_array($value, Arr::wrap($oldData));
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getFieldBoundValue($bind);

            if ($boundValue instanceof Collection && $firstItem = $boundValue->first()) {
                $boundValue = $boundValue->pluck($firstItem->getKeyName())->toArray();
            }

            if ($boundValue instanceof Arrayable) {
                $boundValue = $boundValue->toArray();
            }

            $this->checked = is_null($boundValue)
                ? ($default ?? false)
                : in_array($value, Arr::wrap($boundValue));
        }
    }
}
