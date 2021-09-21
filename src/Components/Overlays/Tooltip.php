<?php

namespace TALLKit\Components\Overlays;

use TALLKit\Components\BladeComponent;

class Tooltip extends BladeComponent
{
    /**
     * @var string|null
     */
    public $value;

    /**
     * @var array
     */
    public $options;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $value
     * @param  array  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($value = null, $options = [], $theme = null)
    {
        parent::__construct($theme);

        $this->value = $value;
        $this->options = $options;
    }

    /**
     * Json options.
     *
     * @param  string  $content
     * @return string
     */
    public function jsonOptions($content)
    {
        return json_encode((object) array_replace_recursive(
            $this->themeProvider->options->getAttributes(),
            compact('content'),
            $this->options,
        ));
    }
}
