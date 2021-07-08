<?php

namespace TALLKit\Components\Supports;

use TALLKit\Components\BladeComponent;

class Avatar extends BladeComponent
{
    /**
     * @var string|null
     */
    public $avatar;

    /**
     * @var string|bool|null
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $search
     * @param  string|null  $src
     * @param  string|null  $provider
     * @param  string|null  $fallback
     * @param  string|bool|null  $icon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $search = null,
        $src = null,
        $provider = null,
        $fallback = null,
        $icon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->avatar = $this->url($search, $src, $provider, $fallback);
        $this->icon = $icon;
    }

    /**
     * Get url.
     *
     * @param  string|null  $search
     * @param  string|null  $src
     * @param  string|null  $provider
     * @param  string|null  $fallback
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

        $query = http_build_query(array_filter([
            'fallback' => $fallback,
        ]));

        return $provider
            ? sprintf('https://unavatar.now.sh/%s/%s?%s', $provider, $search, $query)
            : sprintf('https://unavatar.now.sh/%s?%s', $search, $query);
    }
}
