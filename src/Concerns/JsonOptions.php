<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Collection;

trait JsonOptions
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * Set options.
     *
     * @param  mixed  $options
     * @return void
     */
    protected function setOptions($options)
    {
        $this->options = Collection::make($options)->toArray();
    }

    /**
     * Get options
     *
     * @return array
     */
    protected function getOptions()
    {
        return $this->options;
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
            $this->getOptionsValues(...$args),
            $this->themeProvider->options->getAttributes(),
            $this->getOptions()
        ));
    }
}
