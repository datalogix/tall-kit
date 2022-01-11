<?php

namespace TALLKit\Components\Icons;

use Closure;
use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;

class Icon extends BladeComponent
{
    /**
     * @var string|null
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
            return $this->renderIcon();
        }

        $attributes = $this->attributes->getAttributes();
        $class = data_get($attributes, 'class', '');
        data_set($attributes, 'class', null);

        return svg($this->name, $class, array_filter($attributes));
    }

    /**
     * Render icon.
     *
     * @return Closure
     */
    protected function renderIcon()
    {
        return function (array $data) {
            $slot = data_get($data, 'slot');
            $attributes = data_get($data, 'attributes');

            if (empty(trim($slot)) && empty($attributes)) {
                return '';
            }

            if (empty(trim($slot)) && (string) $attributes) {
                return '<i '.$attributes.'></i>';
            }

            if (Str::startsWith($slot, '<svg')) {
                return str_replace('<svg', sprintf('<svg %s', $attributes), $slot);
            }

            if ((string) $attributes) {
                return '<span '.$attributes.'>'.$slot.'</span>';
            }

            return (string) $slot;
        };
    }
}
