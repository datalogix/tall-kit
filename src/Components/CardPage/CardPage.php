<?php

namespace TALLKit\Components\CardPage;

use TALLKit\View\BladeComponent;

class CardPage extends BladeComponent
{
    protected function attrs()
    {
        return [
            'html' => [
                'style' => 'font-family: Nunito;',
                'class' => 'text-gray-700',
                'turbo' => true,

                'meta' => [
                    'turbo-cache-control' => 'no-preview',
                ],

                'google-fonts' => [
                    'families' => 'Nunito:wght@100;200;300;400;500;600;700;800;900',
                ],

                'components' => [
                    'user-sidebar' => [
                        'disabled' => true,
                    ],
                ],

                /*
                TODO: admin
                'panels' => [
                    'default' => [],

                    'admin' => [
                        'mix-styles' => [
                            'css/admin.css',
                        ],

                        'mix-scripts' => [
                            'js/admin.js',
                        ],

                        'vite' => [
                            'resources/css/admin.css',
                            'resources/css/admin.scss',
                            'resources/css/admin.sass',
                            'resources/js/admin.js',
                            'resources/js/admin.ts',
                        ],
                    ],
                ],
                */
            ],

            'root' => [
                'class' => 'min-h-screen flex flex-col items-center p-6 bg-gray-100 text-gray-500',
            ],

            'header' => [],

            'logo' => [
                'class' => 'block p-10 max-w-md',
            ],

            'card' => [
                'class' => 'w-full sm:max-w-lg mb-4',
            ],

            'messages' => [],
        ];
    }
}
