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
     * @var string|null
     */
    public $svg;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $svg
     * @param  string|null  $preset
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $svg = null,
        $preset = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->svg = $svg;

        if ($preset && $presetProperties = $this->themeProvider->presets->get($preset)) {
            $this->name = $name ?? data_get($presetProperties, 'name', $preset);
            $this->svg = $svg ?? data_get($presetProperties, 'svg', $presetProperties);
        }
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

            if (empty(trim($slot)) && $this->svg) {
                $slot = $this->svg;
            }

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
