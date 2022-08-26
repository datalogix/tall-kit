<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Error extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $text;

    /**
     * @var string|bool|array|null
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $text
     * @param  string|bool|array|null  $icon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $icon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text ?? 'Error';
        $this->icon = $icon;
    }
}
