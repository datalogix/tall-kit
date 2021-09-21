<?php

namespace TALLKit\Components\Sliders;

use TALLKit\Components\BladeComponent;

class Slider extends BladeComponent
{
    /**
     * @var array
     */
    public $options;

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
     * @param  array  $options
     * @param  string|bool|null  $prevIcon
     * @param  string|bool|null  $nextIcon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = [],
        $prevIcon = null,
        $nextIcon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->options = array_replace_recursive($this->themeProvider->options->getAttributes(), $options);
        $this->prevIcon = $prevIcon;
        $this->nextIcon = $nextIcon;
    }

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions()
    {
        return json_encode((object) $this->options);
    }
}
