<?php

namespace TALLKit\Components\Supports;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Unsplash extends ImageLoader
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $photo
     * @param  string|null  $query
     * @param  bool|null  $featured
     * @param  string|null  $username
     * @param  int|null  $width
     * @param  int|null  $height
     * @param  string|bool|null  $icon
     * @param  string|bool|null  $loadingIcon
     * @param  string|bool|null  $errorIcon
     * @param  int|bool|null  $ttl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $photo = 'random',
        $query = '',
        $featured = false,
        $username = '',
        $width = null,
        $height = null,
        $icon = null,
        $loadingIcon = null,
        $errorIcon = null,
        $ttl = 3600,
        $theme = null
    ) {
        parent::__construct(
            $this->url($photo, $query, $featured, $username, $width, $height, $ttl),
            $icon,
            $loadingIcon,
            $errorIcon,
            $ttl,
            $theme
        );
    }

    /**
     * Get url.
     *
     * @param  string|null  $photo
     * @param  string|null  $query
     * @param  bool|null  $featured
     * @param  string|null  $username
     * @param  int|null  $width
     * @param  int|null  $height
     * @param  int|bool|null  $ttl
     * @return string|bool
     */
    protected function url($photo = 'random', $query = '', $featured = false, $username = '', $width = null, $height = null, $ttl = 3600)
    {
        if (! $accessKey = config('services.unsplash.access_key')) {
            return false;
        }

        $url = Cache::remember('unsplash.'.$photo, $ttl, function () use ($accessKey, $photo, $query, $featured, $username) {
            return Http::get("https://api.unsplash.com/photos/{$photo}", array_filter([
                'client_id' => $accessKey,
                'query' => $query,
                'featured' => $featured,
                'username' => $username,
            ]))->json()['urls']['raw'];
        });

        if ($width || $height) {
            $url .= '&'.Arr::query(array_filter([
                'w' => $width,
                'h' => $height,
            ]));
        }

        return $url;
    }
}
