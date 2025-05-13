<?php

namespace TALLKit\Components\Accordion;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Accordion extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'border bg-white rounded-lg',
            )
        ];
    }
}
