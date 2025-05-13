<?php

namespace TALLKit\Components\ErrorPage;

use TALLKit\View\BladeComponent;

class ErrorPage extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => [
                'class' => 'text-center text-xl',
                'pt' => [
                    'html' => [
                        'livewire' => false,
                    ],
                ],
            ],

            'back' => [
                'class' => 'mt-4',
                'href' => url('/'),
            ],
        ];
    }
}
