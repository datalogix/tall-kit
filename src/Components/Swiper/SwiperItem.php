<?php

namespace TALLKit\Components\Swiper;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class SwiperItem extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => Attr::make(
                class: 'swiper-slide',
            ),
        ];
    }
}
