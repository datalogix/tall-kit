<?php

namespace TALLKit\Components\FullCalendar;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class FullCalendar extends BladeComponent
{
    // TODO: review (JsonOptions)
    use JsonOptions;

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'full-calendar',
                setup: $this->jsonOptions()
            )
        ];
    }
}
