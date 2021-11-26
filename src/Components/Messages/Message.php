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
        $title = null,
        $message = null,
        $on = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->session = $session;
        $target = $session ? session($session) : [];

        $this->type = data_get($target, 'type', $type ?? 'info');
        $typeTheme = $this->themeProvider->types->get($this->type, $this->themeProvider->types->get('default'));

        $this->color = data_get($target, 'color', $typeTheme['color'] ?? null);
        $this->mode = data_get($target, 'mode', $mode ?? $typeTheme['mode'] ?? 'default');
        $this->rounded = data_get($target, 'rounded', $rounded ?? $typeTheme['rounded'] ?? 'default');
        $this->shadow = data_get($target, 'shadow', $shadow ?? $typeTheme['shadow'] ?? 'default');
        $this->icon = data_get($target, 'icon', $icon ?? $typeTheme['icon'] ?? true);
        $this->iconSvg = data_get($target, 'icon-svg', $iconSvg ?? $typeTheme['icon-svg'] ?? null);
        $this->iconName = data_get($target, 'icon-name', $iconName ?? $typeTheme['icon-name'] ?? null);
        $this->timeout = data_get($target, 'timeout', $timeout ?? $typeTheme['timeout'] ?? 0);
        $this->dismissible = data_get($target, 'dismissible', $dismissible ?? $typeTheme['dismissible'] ?? false);
        $this->dismissibleIcon = data_get($target, 'dismissibleIcon', $dismissibleIcon ?? $typeTheme['dismissibleIcon'] ?? true);
        $this->dismissibleIconSvg = data_get($target, 'dismissibleIconSvg', $dismissibleIconSvg ?? $this->themeProvider->dismissible->get('icon-svg'));
        $this->dismissibleIconName = data_get($target, 'dismissibleIconName', $dismissibleIconName ?? $this->themeProvider->dismissible->get('icon-name'));
        $this->dismissibleText = data_get($target, 'dismissibleText', $dismissibleText ?? $typeTheme['dismissibleText'] ?? null);
        $this->title = data_get($target, 'title', $title ?? $typeTheme['title'] ?? null);
        $this->message = data_get($target, 'message', $message ?? (is_string($target) ? $target : null) ?? $typeTheme['message'] ?? null);
        $this->on = data_get($target, 'on', $on ?? $typeTheme['on'] ?? null);
    }
}
