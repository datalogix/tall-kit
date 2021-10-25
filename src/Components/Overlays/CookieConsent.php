<?php

namespace TALLKit\Components\Overlays;

class CookieConsent extends Modal
{
    /**
     * @var int
     */
    public $expires;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $subtitle;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var string|null
     */
    public $url;

    /**
     * @var string|null
     */
    public $buttonText;

    /**
     * @var string|null
     */
    public $buttonIcon;

    /**
     * @var string|null
     */
    public $buttonIconLeft;

    /**
     * @var string|null
     */
    public $buttonIconRight;

    /**
     * @var string|bool|null
     */
    public $buttonColor;

    /**
     * @var string
     */
    public $buttonRounded;

    /**
     * @var string
     */
    public $buttonShadow;

    /**
     * @var bool
     */
    public $buttonOutlined;

    /**
     * @var bool
     */
    public $buttonBordered;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  bool  $overlay
     * @param  string  $align
     * @param  string  $transition
     * @param  int  $expires
     * @param  string|null  $title
     * @param  string|null  $subtitle
     * @param  string|null  $description
     * @param  string|null  $url
     * @param  string|null  $more
     * @param  string|null  $buttonText
     * @param  string|null  $buttonIcon
     * @param  string|null  $buttonIconLeft
     * @param  string|null  $buttonIconRight
     * @param  string|bool|null  $buttonColor
     * @param  string  $buttonRounded
     * @param  string  $buttonShadow
     * @param  bool  $buttonOutlined
     * @param  bool  $buttonBordered
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = 'cookie-consent',
        $overlay = false,
        $align = 'bottom-right',
        $transition = 'bottom',
        $expires = 365,
        $title = null,
        $subtitle = null,
        $description = null,
        $url = null,
        $more = null,
        $buttonText = null,
        $buttonIcon = null,
        $buttonIconLeft = null,
        $buttonIconRight = null,
        $buttonColor = 'default',
        $buttonRounded = 'default',
        $buttonShadow = 'default',
        $buttonOutlined = false,
        $buttonBordered = false,
        $theme = null
    ) {
        parent::__construct($name, false, $overlay, $align, $transition, $theme);

        $this->expires = $expires;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->url = $url ?? route_detect(['cookie-privacy', 'privacy-policy']);
        $this->more = $more;
        $this->buttonText = $buttonText;
        $this->buttonIcon = $buttonIcon;
        $this->buttonIconLeft = $buttonIconLeft;
        $this->buttonIconRight = $buttonIconRight;
        $this->buttonColor = $buttonColor;
        $this->buttonRounded = $buttonRounded;
        $this->buttonShadow = $buttonShadow;
        $this->buttonOutlined = $buttonOutlined;
        $this->buttonBordered = $buttonBordered;
    }
}
