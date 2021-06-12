<?php

namespace TALLKit\Components\Icons;

use TALLKit\Components\BladeComponent;

class Icon extends BladeComponent
{
    /**
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @return void
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        if (! $this->name || ! function_exists('svg')) {
            return '';
        }

        $attributes = $this->attributes->getAttributes();

        $class = $attributes['class'] ?? '';

        unset($attributes['class']);

        return svg($this->name, $class, $attributes);
    }
}
