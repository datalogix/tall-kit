<?php

namespace TALLKit\Components\Forms;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use TALLKit\Concerns\PrepareOptions;

class Select extends Field
{
    use PrepareOptions;

    /**
     * @var mixed
     */
    public $selectedKey;

    /**
     * @var bool
     */
    public $multiple;

    /**
     * @var bool
     */
    public $emptyOption;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  mixed  $options
     * @param  string|array|int|null  $itemValue
     * @param  string|array|int|null  $itemText
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  bool|null  $multiple
     * @param  bool|null  $emptyOption
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
        $name = null,
        $label = null,
        $options = null,
        $itemValue = null,
        $itemText = null,
        $bind = null,
        $default = null,
        $multiple = null,
        $emptyOption = null,
        $showErrors = null,
        $theme = null,
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme,
            $groupable ?? true,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->setOptions($options, $itemValue, $itemText);

        if ($this->isNotWired()) {
            $this->selectedKey = $this->getFieldValue($bind, $default);
        }

        $this->multiple = $multiple ?? false;
        $this->emptyOption = $emptyOption ?? true;
    }

    /**
     * Check if the option is selected.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function isSelected($key)
    {
        if ($this->isWired()) {
            return false;
        }

        $value = $this->selectedKey;

        if ($value instanceof Collection) {
            $value = $value->pluck($this->itemValue)->toArray();
        }

        if ($value instanceof Arrayable) {
            $value = $value->toArray();
        }

        return in_array($key, Arr::wrap($value));
    }
}
