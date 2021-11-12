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
     * @var string|bool|null
     */
    public $loadingIcon;

    /**
     * @var string|bool|null
     */
    public $errorIcon;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $url
     * @param  string|bool|null  $icon
     * @param  string|bool|null  $loadingIcon
     * @param  string|bool|null  $errorIcon
     * @param  int|bool|null  $ttl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $url = null,
        $icon = null,
        $loadingIcon = null,
        $errorIcon = null,
        $ttl = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->url = $url;
        $this->src = $this->cache($url, $ttl ?? 3600);
        $this->icon = $icon;
        $this->loadingIcon = $loadingIcon;
        $this->errorIcon = $errorIcon;
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
