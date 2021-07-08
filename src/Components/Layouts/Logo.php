<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Logo extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $name;

    /**
     * @var string|bool|null
     */
    public $image;

    /**
     * @var string|bool|null
     */
    public $url;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $name
     * @param  string|bool|null  $image
     * @param  string|bool|null  $url
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $image = null,
        $url = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name ?? config('app.name');
        $this->image = $image ?? $this->imageAsset();
        $this->url = $url;
    }

    /**
     * Get image asset.
     *
     * @return string|null
     */
    protected function imageAsset()
    {
        if (file_exists(public_path('logo.png'))) {
            return asset('logo.png');
        }

        if (file_exists(public_path('imgs/logo.png'))) {
            return asset('imgs/logo.png');
        }

        if (file_exists(public_path('images/logo.png'))) {
            return asset('images/logo.png');
        }
    }
}
