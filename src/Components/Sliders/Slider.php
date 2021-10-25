<?php

namespace TALLKit\Components\Sliders;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class Slider extends BladeComponent
{
    use JsonOptions;

    /**
     * @var string|bool|null
     */
    public $prevIcon;

    /**
     * @var string|bool|null
     */
    public $nextIcon;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|bool|null  $prevIcon
     * @param  string|bool|null  $nextIcon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $prevIcon = null,
        $nextIcon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setOptions($options);
        $this->prevIcon = $prevIcon;
        $this->nextIcon = $nextIcon;
    }
}
