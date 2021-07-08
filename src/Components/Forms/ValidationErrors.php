<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;

class ValidationErrors extends BladeComponent
{
    /**
     * @var string
     */
    public $bag;

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
     * @param  string|bool|null  $bag
     * @param  string|bool|null  $type
     * @param  string|bool|null  $mode
     * @param  string|bool|null  $rounded
     * @param  string|bool|null  $shadow
     * @param  bool  $icon
     * @param  string|bool|null  $iconSvg
     * @param  string|bool|null  $iconName
     * @param  int  $timeout
     * @param  bool  $dismissible
     * @param  bool  $dismissibleIcon
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
        $bag = null,
        $type = 'danger',
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
        $dismissibleText = null,
        $title = 'Whoops! Something went wrong.',
        $message = null,
        $on = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->bag = $bag ?: 'default';
        $this->type = $type;
        $this->mode = $mode;
        $this->rounded = $rounded;
        $this->shadow = $shadow;
        $this->icon = $icon;
        $this->iconSvg = $iconSvg;
        $this->iconName = $iconName;
        $this->timeout = $timeout;
        $this->dismissible = $dismissible;
        $this->dismissibleIcon = $dismissibleIcon;
        $this->dismissibleIconSvg = $dismissibleIconSvg;
        $this->dismissibleIconName = $dismissibleIconName;
        $this->dismissibleText = $dismissibleText;
        $this->title = $title;
        $this->message = $message;
        $this->on = $on;
    }
}
