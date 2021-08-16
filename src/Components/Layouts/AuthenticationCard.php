<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class AuthenticationCard extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $logoImage;

    /**
     * @var string|bool|null
     */
    public $logoName;

    /**
     * @var string|bool|null
     */
    public $logoUrl;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl;
    }
}
