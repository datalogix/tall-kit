<?php

namespace TALLKit\Components\Icons;

use Closure;
use Illuminate\Support\Str;

class Icon extends AbstractIcon
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $icon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $icon = null,
        $theme = null
    ) {
        parent::__construct($name, $icon, $theme);
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
        $class = target_get($attributes, 'class', '');
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
            $slot = target_get($data, 'slot');
            $attributes = target_get($data, 'attributes');

            if (! Str::startsWith($slot, '<svg') && $preset = $this->themeProvider->presets->get($this->name)) {
                $slot = $preset;
            }

            if (empty(trim($slot)) && (empty($attributes) || (string) $attributes === 'class=""')) {
                return '';
            }

            if (empty(trim($slot)) && (string) $attributes) {
                return '<i '.$attributes.'></i>';
            }

            if (Str::startsWith($slot, '<svg')) {
                return (empty($attributes) || (string) $attributes === 'class=""')
                    ? (string) $slot
                    : str_replace('<svg', sprintf('<svg %s', $attributes), $slot);
            }

            if ((string) $attributes) {
                return '<span '.$attributes.'>'.empty(trim($slot)) ? $slot : $this->name.'</span>';
            }

            return (string) $slot;
        };
    }
}
