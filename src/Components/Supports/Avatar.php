<?php

namespace TALLKit\Components\Supports;

class Avatar extends ImageLoader
{
    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $search
     * @param  string|bool|null  $src
     * @param  string|bool|null  $provider
     * @param  string|bool|null  $fallback
     * @param  string|bool|null  $icon
     * @param  int|bool|null  $ttl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $search = null,
        $src = null,
        $provider = null,
        $fallback = null,
        $icon = null,
        $ttl = null,
        $theme = null
    ) {
        parent::__construct(
            $this->url($search, $src, $provider, $fallback),
            $icon,
            $ttl ?? 3600,
            $theme
        );
    }

    /**
     * Get url.
     *
     * @param  string|bool|null  $search
     * @param  string|bool|null  $src
     * @param  string|bool|null  $provider
     * @param  string|bool|null  $fallback
     * @return string|bool
     */
    protected function url($search = null, $src = null, $provider = null, $fallback = null)
    {
        if (is_string($src)) {
            return $src;
        }

        if (! $fallback && ! $search) {
            return false;
        }

        $query = http_build_query([
            'fallback' => $fallback ?? 'false',
        ]);

        return $provider
            ? sprintf('https://unavatar.io/%s/%s?%s', $provider, $search, $query)
            : sprintf('https://unavatar.io/%s?%s', $search, $query);
    }
}
