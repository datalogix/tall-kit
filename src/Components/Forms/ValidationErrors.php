<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\Messages\Message;

class ValidationErrors extends Message
{
    /**
     * @var string
     */
    public $bag;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|null  $bag
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
        $options = null,
        $bag = null,
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
        parent::__construct(
            $options,
            false,
            $type ?? 'danger',
            $mode,
            $rounded,
            $shadow,
            $icon,
            $iconSvg,
            $iconName,
            $timeout,
            $dismissible,
            $dismissibleIcon,
            $dismissibleIconSvg,
            $dismissibleIconName,
            $dismissibleText,
            $title ?? 'Whoops! Something went wrong.',
            $message,
            $on,
            $theme,
        );

        $this->bag = $bag ?? 'default';
    }
}
