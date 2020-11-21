<?php

namespace Datalogix\TALLKit\Components\Alerts;

use Datalogix\TALLKit\Components\BladeComponent;
use Datalogix\TALLKit\Components\ComponentAttributeBag;

class Alert extends BladeComponent
{
    /**
     * The assets of component.
     *
     * @var array
    */
    protected static $assets = [
        'alpine',
    ];

    /**
     * The alert icon.
     *
     * @var bool
     */
    public $icon;

    /**
     * The alert icon svg.
     *
     * @var string|bool
     */
    public $iconSvg;

    /**
     * The alert icon name.
     *
     * @var string|bool
     */
    public $iconName;

    /**
     * The alert timeout.
     *
     * @var int
     */
    public $timeout;

    /**
     * The alert dismissible.
     *
     * @var bool
     */
    public $dismissible;

    /**
     * The alert dismissible icon.
     *
     * @var bool
     */
    public $dismissibleIcon;

    /**
     * The alert dismissible icon svg.
     *
     * @var string|bool
     */
    public $dismissibleIconSvg;

    /**
     * The alert dismissible icon name.
     *
     * @var string|bool
     */
    public $dismissibleIconName;

    /**
     * The alert dismissible text.
     *
     * @var string
     */
    public $dismissibleText;

    /**
     * The alert title.
     *
     * @var string
     */
    public $title;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * The alert attrs.
     *
     * @var \Datalogix\TALLKit\Components\ComponentAttributeBag
     */
    public $attrs;

    /**
     * Create a new component instance.
     *
     * @param  string  $type
     * @param  string  $style
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
     * @return void
     */
    public function __construct(
        $type = 'info',
        $style = 'default',
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
        $theme = null
    ) {
        parent::__construct($theme);

        $typeTheme = $this->themeProvider->types->get($type, $this->themeProvider->types->get('default'));
        $color = $typeTheme['color'];

        $this->icon = $icon;
        $this->iconSvg = $iconSvg ?? $typeTheme['iconSvg'];
        $this->iconName = $iconName ?? $typeTheme['iconName'];
        $this->timeout = $timeout;
        $this->dismissible = $dismissible;
        $this->dismissibleIcon = $dismissibleIcon;
        $this->dismissibleIconSvg = $dismissibleIconSvg ?? $this->themeProvider->dismissible['iconSvg'];
        $this->dismissibleIconName = $dismissibleIconName ?? $this->themeProvider->dismissible['iconName'];
        $this->dismissibleText = $dismissibleText;
        $this->title = $title ?? $typeTheme['title'];
        $this->message = $message;

        $this->attrs = new ComponentAttributeBag([
            'container' => $this->themeProvider->container
                ->merge(['class' => 'bg-'.$color.'-200 border-'.$color.'-300'])
                ->merge($this->themeProvider->styles->get($style, []))
                ->merge($this->themeProvider->rounded->get($rounded, []))
                ->merge($this->themeProvider->shadow->get($shadow, []))
            ,

            'icon' => $this->themeProvider->icon->merge([
                'class' => 'bg-'.$color.'-100 border-'.$color.'-500 text-'.$color.'-500'
            ]),

            'dismissible' => $this->themeProvider->dismissible['container'],

            'dismissibleIcon' => $this->themeProvider->dismissible['icon'],

            'dismissibleText' => $this->themeProvider->dismissible['text'],

            'title' => $this->themeProvider->title->merge([
                'class' => 'text-'.$color.'-800'
            ]),

            'message' => $this->themeProvider->message->merge([
                'class' => 'text-'.$color.'-600'
            ]),
        ]);
    }
}
