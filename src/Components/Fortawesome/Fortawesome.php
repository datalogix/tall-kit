<?php

namespace TALLKit\Components\Fortawesome;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Fortawesome extends BladeComponent
{
    // TODO: review (styles)

    /*
    $solid = null,
    $regular = null,
    $light = null,
    $thin = null,
    $duotone = null,
    */

    protected array $props = [
        'name' => null,
        'icon' => null,
        'style' => 'solid'
    ];

    protected function processed($data)
    {
        $this->name = $this->name ?? $this->icon;
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                component: 'fortawesome',
                setup: true,
                class: 'fa-' . $this->style
            )
        ];
    }
}
