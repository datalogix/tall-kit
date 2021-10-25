<?php

namespace TALLKit\Components\Sliders;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class Splide extends BladeComponent
{
    use JsonOptions;

    /**
     * @var bool
     */
    public $relative;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  bool  $relative
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $relative = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setOptions($options);
        $this->relative = $relative;
    }
}
