<?php

namespace TALLKit\Components\Splide;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class SplideItem extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'splide__slide',
            ),
        ];
    }
}
