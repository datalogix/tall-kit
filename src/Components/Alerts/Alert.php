<?php

namespace TALLKit\Components\Alerts;

use TALLKit\Components\BladeComponent;

class Alert extends BladeComponent
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $mode;

    /**
     * @var string
     */
    public $rounded;

    /**
     * @var string
     */
    public $shadow;

    /**
     * @var string|null
     */
    public $on;

    /**
     * @var int
     */
    public $timeout;

    /**
     * @var string
     */
    public $color;

    /**
     * @var bool
     */
    public $icon;

    /**
     * @var string|bool
     */
    public $iconSvg;

    /**
     * @var string|bool
     */
    public $iconName;

    /**
     * @var bool
     */
    public $dismissible;

    /**
     * @var bool
     */
    public $dismissibleIcon;

    /**
     * @var string|bool
     */
    public $dismissibleIconSvg;

    /**
     * @var string|bool
     */
    public $dismissibleIconName;

    /**
     * @var string
     */
    public $dismissibleText;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @param  string  $type
     * @param  string  $mode
     * @param  string  $rounded
     * @param  string  $shadow
     * @param  bool  $icon
     * @param  string|bool|null  $iconSvg
     * @param  string|bool|null  $iconName
     * @param  int  $timeout
     * @param  bool  $dismissible
     * @param  bool  $dismissibleIcon
     * @param  string|bool|null  $dismissibleIconSvg
     * @param  string|bool|null  $dismissibleIconName
     * @param  string  $dismissibleText
     * @param  string|null  $title
     * @param  string  $message
     * @param  string|null  $theme
     * @param  string|null  $on
     * @return void
     */
    public function __construct(
        $type = 'info',
        $mode = 'default',
        $rounded = 'default',
        $shadow = 'default',
        $icon = true,
        $iconSvg = null,
        $iconName = null,
        $timeout = 0,
        $dismissible = false,
        $dismissibleIcon = true,
        $dismissibleIconSvg = null,
        $dismissibleIconName = null,
        $dismissibleText = '',
        $title = null,
        $message = '',
        $theme = null,
        $on = null
    ) {
        parent::__construct($theme);

        $typeTheme = $this->themeProvider->types->get($type, $this->themeProvider->types->get('default'));

        $this->type = $type;
        $this->mode = $mode;
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->on = $on;
        $this->timeout = $timeout;
        $this->color = $typeTheme['color'];
        $this->icon = $icon;
        $this->iconSvg = $iconSvg ?? $typeTheme['iconSvg'];
        $this->iconName = $iconName ?? $typeTheme['iconName'];
        $this->dismissible = $dismissible;
        $this->dismissibleIcon = $dismissibleIcon;
        $this->dismissibleIconSvg = $dismissibleIconSvg ?? $this->themeProvider->dismissible->get('iconSvg');
        $this->dismissibleIconName = $dismissibleIconName ?? $this->themeProvider->dismissible->get('iconName');
        $this->dismissibleText = $dismissibleText;
        $this->title = $title ?? $typeTheme['title'];
        $this->message = $message;
    }
}
