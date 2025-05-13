<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Js;

trait JsonOptions
{
    /**
     * @var array
     */
    public $options = [];

    /**
     * Set options.
     *
     * @param  mixed  $options
     * @return void
     */
    protected function setOptions($options)
    {
        $this->options = array_replace_recursive(
            $this->getProps('options', []),
            collect_value($options)->toArray()
        );
    }

    /**
     * Get options.
     *
     * @param  string|array|int|null  $key
     * @return mixed
     */
    public function getOptions($key = null)
    {
        return is_null($key) ? $this->options : target_get($this->options, $key);
    }

    /**
     * Get options values.
     *
     * @return array
     */
    protected function getOptionsValues()
    {
        return [];
    }

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions(...$args)
    {
        return Js::from(array_replace_recursive(
            $this->getOptionsValues(...func_get_args()),
            $this->getOptions()
        ));
    }
}
