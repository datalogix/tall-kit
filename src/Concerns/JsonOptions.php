<?php

namespace TALLKit\Concerns;

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
            $this->themeProvider->options->getAttributes(),
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
        if (is_null($key)) {
            return $this->options;
        }

        return target_get($this->options, $key);
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
        return json_encode((object) array_replace_recursive(
            $this->getOptionsValues(...func_get_args()),
            $this->getOptions()
        ));
    }
}
