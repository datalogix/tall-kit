<?php

namespace TALLKit\Components\Toggleable;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Toggleable extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'show' => false,
        'overlay' => false,
        'closeable' => true,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    '@keydown.escape.window' => 'close(false)',
                    ':class' => '{\'z-30\': isOpened()}',
                ],
                component: 'toggleable',
                setup: [$this->show],
                class: 'relative',
            )->when($this->name, fn ($attr, $value) => $attr->merge([
                '@'.$value.'-open.window' => 'open',
                '@'.$value.'-close.window' => 'close',
                '@'.$value.'-toggle.window' => 'toggle',
            ])),

            'overlay' => Attr::make(
                attributes: ['closeable' => $this->overlay]
            )
        ];
    }
}
