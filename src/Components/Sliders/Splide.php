<?php

namespace TALLKit\Components\Sliders;

use TALLKit\Components\BladeComponent;

class Splide extends BladeComponent
{
    /**
     * @var array
     */
    public $options;

    /**
     * @var bool
     */
    public $relative;

    /**
     * Create a new component instance.
     *
     * @param  array  $options
     * @param  bool  $relative
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = [],
        $relative = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->options = array_replace_recursive($this->themeProvider->options->getAttributes(), $options);
        $this->relative = $relative;
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
