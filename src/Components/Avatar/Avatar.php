<?php

namespace TALLKit\Components\Avatar;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Avatar extends BladeComponent
{
    protected array $props = [
        'search' => null,
        'src' => null,
        'provider' => null,
        'fallback' => null,
        'icon' => 'account',
        'ttl' => 3600,
    ];

    protected function attrs()
    {
        return [
           'root' => Attr::make(
                attributes: [
                    'url' => $this->buildUrl(),
                    'icon' => $this->icon,
                    'ttl' => $this->ttl
                ],
                pt: [
                    'icon' => 'w-6 h-6 mx-auto'
                ]
            )
        ];
    }

    protected function buildUrl()
    {
        if (is_string($this->src)) {
            return $this->src;
        }

        if (! $this->fallback && ! $this->search) {
            return false;
        }

        $query = http_build_query(['fallback' => $this->fallback ?? 'false']);

        return $this->provider
            ? sprintf('https://unavatar.io/%s/%s?%s', $this->provider, $this->search, $query)
            : sprintf('https://unavatar.io/%s?%s', $this->search, $query);
    }
}
