<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Logo extends BladeComponent
{
    /**
     * @var string|bool
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
        $paths = ['logo.png', 'imgs/logo.png', 'images/logo.png'];

        foreach ($paths as $path) {
            if (file_exists(public_path($path))) {
                return asset($path);
            }
        }
    }
}
