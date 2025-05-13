<?php

namespace TALLKit\Components\Flickity;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Flickity extends BladeComponent
{
    // TODO: review (JsonOptions)
    use JsonOptions;

    protected array $props = [
        // See https://flickity.metafizzy.co/options.html
        'options' => null
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'flickity',
                ignore: true,
                setup: $this->jsonOptions(),
            )
        ];
    }
}
