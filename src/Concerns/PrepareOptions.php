<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Collection;

trait PrepareOptions
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $options;

    /**
     * @var string|array|int|null
     */
    public $itemValue;

    /**
     * @var string|array|int|null
     */
    public $itemText;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|array|int|null  $itemValue
     * @param  string|array|int|null  $itemText
     * @return void
     */
    public function setOptions($options = null, $itemValue = null, $itemText = null)
    {
        $this->itemValue = $itemValue ?? 'id';
        $this->itemText = $itemText ?? 'name';
        $this->options = $this->prepareOptions($options);
    }

    /**
     * Prepare options.
     *
     * @param  mixed  $options
     * @return \Illuminate\Support\Collection
     */
    protected function prepareOptions($options = null)
    {
        return Collection::make($options)
            ->mapWithKeys(function ($value, $key) {
                $key = data_get($value, $this->itemValue, $key);
                $value = is_iterable($value)
                    ? $this->prepareOptions($value)
                    : data_get($value, $this->itemText, data_get($value, 'name', data_get($value, 'title', data_get($value, 'text', $value))));

                return [$key => $value];
            });
    }
}
