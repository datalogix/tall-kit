<?php

namespace Datalogix\TALLKit\Components\Icons;

use Datalogix\TALLKit\Components\BladeComponent;

class Icon extends BladeComponent
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @return void
     */
    public function __construct($name = null)
    {
        $this->withName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        if (! $this->componentName) {
            return '';
        }

        $attributes = toArray($this->attributes);

        $class = $attributes['class'] ?? '';

        unset($attributes['class']);

        return svg($this->componentName, $class, $attributes)->toHtml();
    }
}
