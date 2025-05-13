<?php

namespace TALLKit\Components\ImageLoader;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class ImageLoader extends BladeComponent
{
    protected array $props = [
        'url' => null,
        'icon' => 'image',
        'ttl' => 3600,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'image-loader',
                setup: true
            ),

            'image' => Attr::make(
                attributes: [
                    'src' => $this->cache($this->url),
                    'x-show' => 'isCompleted()',
                    'x-ref' => 'image',
                ]
            ),

            'icon' => Attr::make(
                attributes: [
                    'x-show' => 'isLoading() || isFailed()',
                    'name' => $this->icon
                ]
            ),

            'loading' => Attr::make(
                attributes: [
                    'x-show' => 'isLoading()',
                    'text' => false,
                ],
                pt: [
                    'icon' => 'w-full h-full'
                ]
            ),

            'error' => Attr::make(
                attributes: [
                    'x-show' => 'isFailed()',
                    'text' => false,
                ],
                pt: [
                    'icon' => 'w-full h-full'
                ]
            ),
        ];
    }

    protected function cache($url)
    {
        if (!$url) return;

        return Cache::remember('image-loader.'.$url, $this->ttl, function () use ($url) {
            try {
                $content = Http::get($url)->body();
                $type = finfo_buffer(finfo_open(FILEINFO_MIME_TYPE), $content);

                return 'data:'.$type.';base64,'.base64_encode($content);
            } catch (Exception $ex) {
                return false;
            }
        });
    }
}
