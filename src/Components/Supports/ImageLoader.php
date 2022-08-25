<?php

namespace TALLKit\Components\Supports;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use TALLKit\Components\BladeComponent;

class ImageLoader extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $url;

    /**
     * @var string|bool|null
     */
    public $src;

    /**
     * @var string|bool|null
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $url
     * @param  string|bool|null  $icon
     * @param  int|bool|null  $ttl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $url = null,
        $icon = null,
        $ttl = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->url = $url;
        $this->src = $this->cache($url, $ttl ?? 3600);
        $this->icon = $icon;
    }

    /**
     * Cache.
     *
     * @param  string|bool|null  $url
     * @param  int|bool|null  $ttl
     * @return string|bool|null
     */
    protected function cache($url, $ttl)
    {
        if (! $url || ! $ttl) {
            return $url;
        }

        return Cache::remember('image-loader.'.$url, $ttl, function () use ($url) {
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
