<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TALLKit\Concerns\BoundValues;

class Select extends Field
{
    use BoundValues;

    /**
     * @var mixed
     */
    public $selectedKey;

    /**
     * @var mixed
     */
    public $options = [];

    /**
     * @var string|array|int|null
     */
    public $itemText = null;

    /**
     * @var string|array|int|null
     */
    public $itemValue = null;

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var bool
     */
    public $emptyOption = true;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  string|array|int|null  $itemText
     * @param  string|array|int|null  $itemValue
     * @param  mixed  $options
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  bool  $multiple
     * @param  bool  $emptyOption
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  bool  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $itemText = null,
        $itemValue = null,
        $options = [],
        $bind = null,
        $default = null,
        $multiple = false,
        $emptyOption = true,
        $showErrors = true,
        $theme = null,
        $groupable = true,
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
            $groupable,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->itemText = $itemText ?: 'name';
        $this->itemValue = $itemValue ?: 'id';
        $this->options = $this->prepareOptions($options);

        if ($this->isNotWired()) {
            $key = Str::before($this->name, '[]');
            $default = $this->getBoundValue($bind, $key) ?: $default;

            $this->selectedKey = old($key, $default);
        }

        $this->multiple = $multiple;
        $this->emptyOption = $emptyOption;
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

        return in_array($key, Arr::wrap($value));
    }

    /**
     * Prepare options.
     *
     * @param  mixed  $options
     * @return array
     */
    protected function prepareOptions($options)
    {
        return Collection::make($options)
            ->mapWithKeys(function ($value, $key) {
                $key = data_get($value, $this->itemValue, $key);
                $value = data_get($value, $this->itemText, $value);

                return [$key => $value];
            })
            ->toArray();
    }
}
