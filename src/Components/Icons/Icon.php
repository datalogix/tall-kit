<?php

namespace Datalogix\TALLKit\Components\Icons;

use Datalogix\TALLKit\Components\BladeComponent;

class Icon extends BladeComponent
{
    /**
     * The icone name.
     *
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
        if (! $this->name) {
            return '';
        }

        $attributes = toArray($this->attributes);

        $class = $attributes['class'] ?? '';

        unset($attributes['class']);

        return svg($this->name, $class, $attributes)->toHtml();
    }
}
