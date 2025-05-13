<?php

namespace TALLKit\Components\Unsplash;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Unsplash extends BladeComponent
{
    protected array $props = [
        'photo' => 'random',
        'query' => '',
        'featured' => false,
        'username' => '',
        'width' => null,
        'height' => null,
        'icon' => null,
        'ttl' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'url' => $this->buildUrl(),
                    'icon' => $this->icon
                ],
            ),
        ];
    }

    protected function buildUrl()
    {
        if (! $accessKey = config('services.unsplash.access_key')) {
            return false;
        }

        $url = Cache::remember('unsplash.'.$this->photo, $this->ttl, function () use ($accessKey) {
            $client = Http::get("https://api.unsplash.com/photos/{$this->photo}", array_filter([
                'client_id' => $accessKey,
                'query' => $this->query,
                'featured' => $this->featured,
                'username' => $this->username,
            ]));

            return data_get($client->json(), 'urls.raw');
        });

        if ($this->width || $this->height) {
            $url .= '&'.Arr::query(array_filter([
                'w' => $this->width,
                'h' => $this->height,
            ]));
        }

        return $url;
    }
}
