<?php

namespace TALLKit\Components\Slider;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class SliderItem extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'w-full shrink-0 snap-center',
            ),
        ];
    }
}
