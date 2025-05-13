<?php

namespace TALLKit\View;

use Illuminate\View\ComponentAttributeBag;

class Attr extends ComponentAttributeBag
{
    public function __construct($attributes = [])
    {
        if ($attributes instanceof ComponentAttributeBag) {
            $attributes = $attributes->getAttributes();
        }

        return parent::__construct($attributes);
    }

    public function attr($name, $value = '', $escape = false)
    {
        return $name ? $this->merge([$name => $value], $escape) : $this;
    }

    public function component($name, $cloak = true)
    {
        return $this
            ->attr('x-data', 'window.tallkit.component(\'' . $name . '\')', false)
            ->cloak($cloak);
    }

    public function cloak($enable = true)
    {
        if ($enable) $this->offsetSet('x-cloak', '');
        else $this->offsetUnset('x-cloak');

        return $this;
    }

    public function ignore($enable = true)
    {
        if ($enable) $this->offsetSet('wire:ignore', '');
        else $this->offsetUnset('wire:ignore');

        return $this;
    }

    public function setup($args)
    {
        $params = is_array($args) ? $args : func_get_args();

        return $this->attr('x-init', 'setup(' . join(',', $params) . ')', false);
    }

    public function merge($attrs = [], $escape = true)
    {
        if ($attrs instanceof ComponentAttributeBag) {
            $attrs = $attrs->getAttributes();
        }

        return parent::merge($attrs, $escape);
    }

    public function classFromPack()
    {
        return $this;
    }

    public static function make(
        array $attributes = [],
        $component = null,
        $setup = null,
        bool $ignore = null,
        $class = null,
        array $pt = null,
    ) {
        return (new static($attributes))
            ->when($component, fn ($attr, $value) => $attr->component($value))
            ->when($setup, fn ($attr, $value) => $attr->setup($value))
            ->when($class, fn ($attr, $value) => $attr->class($value))
            ->when($ignore, fn ($attr, $value) => $attr->ignore($value))
            ->when($pt, fn ($attr, $value) => $attr->attr('pt', $value));
    }
}
