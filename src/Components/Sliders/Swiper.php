<?php

namespace TALLKit\Components\Sliders;

use TALLKit\Components\BladeComponent;

class Swiper extends BladeComponent
{
    /**
     * @var array
     */
    public $options;

    /**
     * Create a new component instance.
     *
     * @param  array  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = [],
        $theme = null
    ) {
        parent::__construct($theme);

        $this->options = array_replace_recursive($this->themeProvider->options->getAttributes(), $options);
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
