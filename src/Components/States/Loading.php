<?php

namespace TALLKit\Components\States;

use TALLKit\Components\BladeComponent;

class Loading extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $text;

    /**
     * @var string|bool|null
     */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $text
     * @param  string|bool|null  $icon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $icon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text ?? 'Loading';
        $this->icon = $icon;
    }
}
