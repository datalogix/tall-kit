<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\BladeComponent;

class Submit extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => [
                'type' => 'submit',
                'loading' => true,
            ],
        ];
    }
}
