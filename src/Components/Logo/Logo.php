<?php

namespace TALLKit\Components\Logo;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Logo extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'image' => null,
        'url' => null,
        'route' => null,
    ];

    protected function processed($data)
    {
        $this->name ??= config('app.name');
        $this->image ??= find_image('logo');
        $this->url ??= route_detect(routes: $this->route, default: null);
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'flex items-center justify-center',
                attributes: [
                    'href' => $this->url,
                ]
            ),

            'image' => Attr::make(
                class: 'mx-auto',
                attributes: [
                    'src' => $this->image,
                    'alt' => $this->name,
                ]
            ),

            'name' => Attr::make(
                class: 'text-2xl font-semibold',
            )
        ];
    }
}
