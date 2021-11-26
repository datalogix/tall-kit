<?php

namespace TALLKit\Components\Forms;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Select extends Field
{
    /**
     * @var mixed
     */
    public $selectedKey;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $options;

    /**
     * @var string|array|int
     */
    public $itemText = null;

    /**
     * @var string|array|int
     */
    public $itemValue = null;

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
     * @param  string|array|int|null  $itemText
     * @param  string|array|int|null  $itemValue
     * @param  mixed  $options
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
        $itemText = null,
        $itemValue = null,
        $options = null,
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

        $this->itemText = $itemText ?: 'name';
        $this->itemValue = $itemValue ?: 'id';
        $this->options = $this->prepareOptions($options);

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

    /**
     * Prepare options.
     *
     * @param  mixed  $options
     * @return \Illuminate\Support\Collection
     */
    protected function prepareOptions($options)
    {
        return Collection::make($options)
            ->mapWithKeys(function ($value, $key) {
                $key = data_get($value, $this->itemValue, $key);
                $value = is_iterable($value)
                    ? $this->prepareOptions($value)
                    : data_get($value, $this->itemText, data_get($value, 'title', data_get($value, 'name', $value)));

                return [$key => $value];
            });
    }
}
