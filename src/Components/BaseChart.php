<?php

namespace TALLKit\Components;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

abstract class BaseChart extends BladeComponent
{
    // TODO: review (JsonOptions)
    use JsonOptions;

    public $canvas = false;

    protected array $props = [
        'name' => null,
        'url' => null,
        'width' => null,
        'height' => null,
    ];

    protected function attrs()
    {
        $size = $this->size();

        return [
            'root' => Attr::make(
                attributes: $size,
                component: $this->getThemeKey(),
                setup: '{...'.$this->jsonOptions().', ...(data || {})}'
            ),

            'fetchable' => Attr::make(
                attributes: ['url' => $this->url] + $size,
                // TODO: review (theme)
                // 'theme:content' => 'grid place-items-center',
            ),

            'canvas' => Attr::make(
                attributes: $size + [
                    'x-ref' => 'canvas',
                ],
            ),
        ];
    }

    protected function size()
    {
        $sizes = collect();

        if ($this->width) {
            $sizes->put('width', str($this->width)->replaceLast('px', '').'px');
        }

        if ($this->height) {
            $sizes->put('height', str($this->height)->replaceLast('px', '').'px');
        }

        if ($sizes->isEmpty()) {
            return [];
        }

        return [
            'style' => $sizes->map(function ($value, $key) {
                return $key.':'.$value;
            })->join(';'),
        ];
    }

    protected function getComponentView()
    {
        return __DIR__.'/base-chart.blade.php';
    }
}
