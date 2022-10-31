<?php

namespace TALLKit\Components\Messages;

use TALLKit\Components\BladeComponent;

class Message extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $session;

    /**
     * @var string|null
     */
    public $color;

    /**
     * @var string|bool
     */
    public $type;

    /**
     * @var string|bool
     */
    public $mode;

    /**
     * @var string|bool
     */
    public $rounded;

    /**
     * @var string|bool
     */
    public $shadow;

    /**
     * @var bool
     */
    public $icon;

    /**
     * @var string|bool|null
     */
    public $iconSvg;

    /**
     * @var string|bool|null
     */
    public $iconName;

    /**
     * @var int
     */
    public $timeout;

    /**
     * @var bool
     */
    public $dismissible;

    /**
     * @var bool
     */
    public $dismissibleIcon;

    /**
     * @var string|bool|null
     */
    public $dismissibleIconSvg;

    /**
     * @var string|bool|null
     */
    public $dismissibleIconName;

    /**
     * @var string|null
     */
    public $dismissibleText;

    /**
     * @var string|bool|null
     */
    public $dismissibleTooltip;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $message;

    /**
     * @var string|null
     */
    public $on;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|bool|null  $session
     * @param  string|bool|null  $type
     * @param  string|bool|null  $mode
     * @param  string|bool|null  $rounded
     * @param  string|bool|null  $shadow
     * @param  bool|null  $icon
     * @param  string|bool|null  $iconSvg
     * @param  string|bool|null  $iconName
     * @param  int|null  $timeout
     * @param  bool|null  $dismissible
     * @param  bool|null  $dismissibleIcon
     * @param  string|bool|null  $dismissibleIconSvg
     * @param  string|bool|null  $dismissibleIconName
     * @param  string|null  $dismissibleText
     * @param  string|bool|null  $dismissibleTooltip
     * @param  string|null  $title
     * @param  string|null  $message
     * @param  string|null  $on
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $session = null,
        $type = null,
        $mode = null,
        $rounded = null,
        $shadow = null,
        $icon = null,
        $iconSvg = null,
        $iconName = null,
        $timeout = null,
        $dismissible = null,
        $dismissibleIcon = null,
        $dismissibleIconSvg = null,
        $dismissibleIconName = null,
        $dismissibleText = null,
        $dismissibleTooltip = null,
        $title = null,
        $message = null,
        $on = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $options = $options ?? ($session ? session($session) : []);
        $this->session = $session;
        $this->type = target_get($options, 'type', $type ?? 'info');
        $typeTheme = $this->themeProvider->types->get($this->type, $this->themeProvider->types->get('default'));
        $this->color = target_get($options, 'color', target_get($typeTheme, 'color'));
        $this->mode = target_get($options, 'mode', $mode ?? target_get($typeTheme, 'mode', 'default'));
        $this->rounded = target_get($options, 'rounded', $rounded ?? target_get($typeTheme, 'rounded', 'default'));
        $this->shadow = target_get($options, 'shadow', $shadow ?? target_get($typeTheme, 'shadow', 'default'));
        $this->icon = target_get($options, 'icon', $icon ?? target_get($typeTheme, 'icon', true));
        $this->iconSvg = target_get($options, 'icon-svg', $iconSvg ?? target_get($typeTheme, 'icon-svg'));
        $this->iconName = target_get($options, 'icon-name', $iconName ?? target_get($typeTheme, 'icon-name'));
        $this->timeout = target_get($options, 'timeout', $timeout ?? target_get($typeTheme, 'timeout', 0));
        $this->timeout = $this->timeout === true ? $this->themeProvider->timeout->first() : $this->timeout;
        $this->dismissible = target_get($options, 'dismissible', $dismissible ?? target_get($typeTheme, 'dismissible', false));
        $this->dismissibleIcon = target_get($options, 'dismissible-icon', $dismissibleIcon ?? target_get($typeTheme, 'dismissible-icon', true));
        $this->dismissibleIconSvg = target_get($options, 'dismissible-icon-svg', $dismissibleIconSvg ?? $this->themeProvider->dismissible->get('icon-svg'));
        $this->dismissibleIconName = target_get($options, 'dismissible-icon-name', $dismissibleIconName ?? $this->themeProvider->dismissible->get('icon-name'));
        $this->dismissibleText = target_get($options, 'dismissible-text', $dismissibleText ?? target_get($typeTheme, 'dismissible-text'));
        $this->dismissibleTooltip = target_get($options, 'dismissible-tooltip', $dismissibleTooltip ?? target_get($typeTheme, 'dismissible-tooltip'));
        $this->title = target_get($options, 'title', $title ?? target_get($typeTheme, 'title'));
        $this->message = target_get($options, 'message', $message ?? (is_string($options) ? $options : null) ?? target_get($typeTheme, 'message'));
        $this->on = target_get($options, 'on', $on ?? target_get($typeTheme, 'on'));
    }
}
