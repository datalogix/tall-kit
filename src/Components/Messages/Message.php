<?php

namespace TALLKit\Components\Messages;

use TALLKit\Components\BladeComponent;

class Message extends BladeComponent
{
    /**
     * @var string|null
     */
    public $session;

    /**
     * @var string|null
     */
    public $color;

    /**
     * @var string|bool|null
     */
    public $type;

    /**
     * @var string|bool|null
     */
    public $mode;

    /**
     * @var string|bool|null
     */
    public $rounded;

    /**
     * @var string|bool|null
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
     * @var int|null
     */
    public $timeout;

    /**
     * @var bool|null
     */
    public $dismissible;

    /**
     * @var bool|null
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
     * @param  bool  $icon
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
        $this->type = data_get($session ? session($session) : [], 'type', $type ?? 'info');

        $typeTheme = $this->themeProvider->types->get($this->type, $this->themeProvider->types->get('default'));

        $this->color = data_get($session ? session($session) : [], 'color', $typeTheme['color'] ?? null);
        $this->mode = data_get($session ? session($session) : [], 'mode', $mode ?? $typeTheme['mode'] ?? 'default');
        $this->rounded = data_get($session ? session($session) : [], 'rounded', $rounded ?? $typeTheme['rounded'] ?? 'default');
        $this->shadow = data_get($session ? session($session) : [], 'shadow', $shadow ?? $typeTheme['shadow'] ?? 'default');
        $this->icon = data_get($session ? session($session) : [], 'icon', $icon ?? $typeTheme['icon'] ?? true);
        $this->iconSvg = data_get($session ? session($session) : [], 'iconSvg', $iconSvg ?? $typeTheme['iconSvg'] ?? null);
        $this->iconName = data_get($session ? session($session) : [], 'iconName', $iconName ?? $typeTheme['iconName'] ?? null);
        $this->timeout = data_get($session ? session($session) : [], 'timeout', $timeout ?? $typeTheme['timeout'] ?? 0);
        $this->dismissible = data_get($session ? session($session) : [], 'dismissible', $dismissible ?? $typeTheme['dismissible'] ?? false);
        $this->dismissibleIcon = data_get($session ? session($session) : [], 'dismissibleIcon', $dismissibleIcon ?? $typeTheme['dismissibleIcon'] ?? true);
        $this->dismissibleIconSvg = data_get($session ? session($session) : [], 'dismissibleIconSvg', $dismissibleIconSvg ?? $this->themeProvider->dismissible->get('iconSvg'));
        $this->dismissibleIconName = data_get($session ? session($session) : [], 'dismissibleIconName', $dismissibleIconName ?? $this->themeProvider->dismissible->get('iconName'));
        $this->dismissibleText = data_get($session ? session($session) : [], 'dismissibleText', $dismissibleText ?? $typeTheme['dismissibleText'] ?? null);
        $this->title = data_get($session ? session($session) : [], 'title', $title ?? $typeTheme['title'] ?? null);
        $this->message = data_get($session ? session($session) : [], 'message', $message ?? (is_string(session($session)) ? session($session) : null) ?? $typeTheme['message'] ?? null);
        $this->on = data_get($session ? session($session) : [], 'on', $on ?? $typeTheme['on'] ?? null);
    }
}
