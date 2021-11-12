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

        $class = $attributes['class'] ?? '';

        unset($attributes['class']);

        return svg($this->name, $class, $attributes);
    }

    /**
     * Render icon.
     *
     * @return Closure
     */
    protected function renderIcon()
    {
        return function (array $data) {
            if (empty(trim($data['slot'])) && empty($data['attributes'])) {
                return '';
            }

            if (empty(trim($data['slot'])) && (string) $data['attributes']) {
                return '<i '.$data['attributes'].'></i>';
            }

            if (Str::startsWith($data['slot'], '<svg')) {
                return str_replace('<svg', sprintf('<svg %s', $data['attributes']), $data['slot']);
            }

            if ((string) $data['attributes']) {
                return '<span '.$data['attributes'].'>'.$data['slot'].'</span>';
            }

            return (string) $data['slot'];
        };
    }
}
