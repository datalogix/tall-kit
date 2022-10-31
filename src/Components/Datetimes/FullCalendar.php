<?php

namespace TALLKit\Components\Datetimes;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class FullCalendar extends BladeComponent
{
    use JsonOptions;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setOptions($options);
    }
}
