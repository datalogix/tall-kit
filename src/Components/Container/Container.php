<?php

namespace TALLKit\Components\Container;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Container extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' =>  Attr::make(
                class: 'container mx-auto px-4',
            )
        ];
    }
}
