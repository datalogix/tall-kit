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
     * @var string|bool|null
     */
    public $buttonIcon;

    /**
     * @var string|bool|null
     */
    public $buttonIconLeft;

    /**
     * @var string|bool|null
     */
    public $buttonIconRight;

    /**
     * @var string|bool
     */
    public $buttonColor;

    /**
     * @var string|bool
     */
    public $buttonRounded;

    /**
     * @var string|bool
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
     * @param  string|null  $name
     * @param  bool|null  $overlay
     * @param  bool|null  $closeable
     * @param  string|null  $align
     * @param  string|null  $transition
     * @param  int|null  $expires
     * @param  string|null  $title
     * @param  string|null  $subtitle
     * @param  string|null  $description
     * @param  string|null  $url
     * @param  string|null  $more
     * @param  string|null  $buttonText
     * @param  string|bool|null  $buttonIcon
     * @param  string|bool|null  $buttonIconLeft
     * @param  string|bool|null  $buttonIconRight
     * @param  string|bool|null  $buttonColor
     * @param  string|bool|null  $buttonRounded
     * @param  string|bool|null  $buttonShadow
     * @param  bool|null  $buttonOutlined
     * @param  bool|null  $buttonBordered
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $overlay = null,
        $closeable = null,
        $align = null,
        $transition = null,
        $expires = null,
        $title = null,
        $subtitle = null,
        $description = null,
        $url = null,
        $more = null,
        $buttonText = null,
        $buttonIcon = null,
        $buttonIconLeft = null,
        $buttonIconRight = null,
        $buttonColor = null,
        $buttonRounded = null,
        $buttonShadow = null,
        $buttonOutlined = null,
        $buttonBordered = null,
        $theme = null
    ) {
        parent::__construct(
            $name ?? 'cookie-consent',
            false,
            $overlay ?? false,
            $closeable ?? false,
            $align ?? 'bottom-right',
            $transition ?? 'bottom',
            $theme
        );

        $this->expires = $expires ?? 365;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->url = $url ?? route_detect(['cookie-privacy', 'privacy-policy']);
        $this->more = $more;
        $this->buttonText = $buttonText;
        $this->buttonIcon = $buttonIcon;
        $this->buttonIconLeft = $buttonIconLeft;
        $this->buttonIconRight = $buttonIconRight;
        $this->buttonColor = $buttonColor ?? 'default';
        $this->buttonRounded = $buttonRounded ?? 'default';
        $this->buttonShadow = $buttonShadow ?? 'default';
        $this->buttonOutlined = $buttonOutlined ?? false;
        $this->buttonBordered = $buttonBordered ?? false;
    }
}
