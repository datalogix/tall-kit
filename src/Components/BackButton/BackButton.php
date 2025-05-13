<?php

namespace TALLKit\Components\BackButton;

use TALLKit\View\BladeComponent;

class BackButton extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => [
                'preset' => 'back',
                'href' => url()->previous(),
            ]
        ];
    }
}
