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
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|array|int|null  $itemValue
     * @param  string|array|int|null  $itemText
     * @return void
     */
    public function setOptions($options = null, $itemValue = null, $itemText = null)
    {
        $this->options = $this->prepareOptions($options, $itemValue, $itemText);
    }

    /**
     * Prepare options.
     *
     * @param  mixed  $options
     * @param  string|array|int|null  $itemValue
     * @param  string|array|int|null  $itemText
     * @return \Illuminate\Support\Collection
     */
    protected function prepareOptions($options = null, $itemValue = null, $itemText = null)
    {
        return Collection::make($options)
            ->mapWithKeys(function ($value, $key) use ($itemValue, $itemText) {
                $key = data_get($value, $itemValue ?: 'id', $key);
                $value = is_iterable($value)
                    ? $this->prepareOptions($value, $itemValue, $itemText)
                    : data_get($value, $itemText ?: 'name', data_get($value, 'title', data_get($value, 'text', $value)));

                return [$key => $value];
            });
    }
}
