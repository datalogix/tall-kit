<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class AuthenticationCard extends BladeComponent
{
    /**
     * @var bool|array
     */
    public $html;

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
     * @var string|bool|null
     */
    public $messageSession;

    /**
     * Create a new component instance.
     *
     * @param  bool|array  $html
     * @param  string|bool|null  $logoImage
     * @param  string|bool|null  $logoName
     * @param  string|bool|null  $logoUrl
     * @param  string|bool|null  $messageSession
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $html = true,
        $logoImage = null,
        $logoName = null,
        $logoUrl = null,
        $messageSession = 'status',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->html = $html ? array_replace_recursive(
            $this->themeProvider->html->getAttributes(),
            is_array($html) ? $html : []
        ) : false;

        $this->logoImage = $logoImage;
        $this->logoName = $logoName;
        $this->logoUrl = $logoUrl;
        $this->messageSession = $messageSession;
    }
}
