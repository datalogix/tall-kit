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

        $this->session = $session;
        $target = $session ? session($session) : [];

        $this->type = target_get($target, 'type', $type ?? 'info');
        $typeTheme = $this->themeProvider->types->get($this->type, $this->themeProvider->types->get('default'));

        $this->color = target_get($target, 'color', target_get($typeTheme, 'color'));
        $this->mode = target_get($target, 'mode', $mode ?? target_get($typeTheme, 'mode', 'default'));
        $this->rounded = target_get($target, 'rounded', $rounded ?? target_get($typeTheme, 'rounded', 'default'));
        $this->shadow = target_get($target, 'shadow', $shadow ?? target_get($typeTheme, 'shadow', 'default'));
        $this->icon = target_get($target, 'icon', $icon ?? target_get($typeTheme, 'icon', true));
        $this->iconSvg = target_get($target, 'icon-svg', $iconSvg ?? target_get($typeTheme, 'icon-svg'));
        $this->iconName = target_get($target, 'icon-name', $iconName ?? target_get($typeTheme, 'icon-name'));
        $this->timeout = target_get($target, 'timeout', $timeout ?? target_get($typeTheme, 'timeout', 0));
        $this->timeout = $this->timeout === true ? $this->themeProvider->timeout->first() : $this->timeout;
        $this->dismissible = target_get($target, 'dismissible', $dismissible ?? target_get($typeTheme, 'dismissible', false));
        $this->dismissibleIcon = target_get($target, 'dismissible-icon', $dismissibleIcon ?? target_get($typeTheme, 'dismissible-icon', true));
        $this->dismissibleIconSvg = target_get($target, 'dismissible-icon-svg', $dismissibleIconSvg ?? $this->themeProvider->dismissible->get('icon-svg'));
        $this->dismissibleIconName = target_get($target, 'dismissible-icon-name', $dismissibleIconName ?? $this->themeProvider->dismissible->get('icon-name'));
        $this->dismissibleText = target_get($target, 'dismissible-text', $dismissibleText ?? target_get($typeTheme, 'dismissible-text'));
        $this->dismissibleTooltip = target_get($target, 'dismissible-tooltip', $dismissibleTooltip ?? target_get($typeTheme, 'dismissible-tooltip'));
        $this->title = target_get($target, 'title', $title ?? target_get($typeTheme, 'title'));
        $this->message = target_get($target, 'message', $message ?? (is_string($target) ? $target : null) ?? target_get($typeTheme, 'message'));
        $this->on = target_get($target, 'on', $on ?? target_get($typeTheme, 'on'));
    }
}
