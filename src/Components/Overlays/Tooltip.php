<?php

namespace TALLKit\Components\Overlays;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class Tooltip extends BladeComponent
{
    use JsonOptions;

    /**
     * @var string|null
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $value
     * @param  mixed  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $value = null,
        $options = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->value = $value;
        $this->setOptions($options);
    }

    /**
     * Get options values.
     *
     * @param  mixed  $content
     * @return array
     */
    protected function getOptionsValues($content)
    {
        return compact('content');
    }
}
