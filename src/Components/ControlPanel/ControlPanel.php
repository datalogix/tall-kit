<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Collection;
use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\User;

class ControlPanel extends BladeComponent
{
    use User;

    /**
     * @var string|bool
     */
    public $title;

    /**
     * @var mixed
     */
    public $menu;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $title
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|null  $guard
     * @param  mixed  $menu
     * @param  array|null  $props
     * @return void
     */
    public function __construct(
        $user = null,
        $guard = null,
        $title = null,
        $menu = null,
        $props = null,
    ) {
        parent::__construct(props: $props);

        // TODO: resolve theme
        $this->setUser($user, $guard ?? ($this->theme === 'default' ? null : $this->theme));

        $this->title = $title ?? $this->props('title') ?? config('app.name');
        $this->menu = Collection::make($menu ?? $this->props('menu') ?? $this->getUserValue('sidebar', $this->guard.'Sidebar'))->filter();
    }

    protected function getAttrs()
    {
        return [
            'html' => [
                'style' => 'font-family: Nunito;',
                'class' => 'text-gray-700',
            ],

            'container' => [
                'class' => 'flex h-screen bg-gray-100',
            ],

            'sidebar' => [],

            'box' => [
                'class' => 'flex-1 flex flex-col overflow-hidden',
            ],

            'toolbar' => [],

            'toggler' => [
                'x-data' => '',
            ],

            'main' => [
                'class' => 'flex-1 overflow-auto bg-transparent',
            ],

            'content' => [
                'class' => 'p-6 lg:p-10',
            ],

            'messages' => [],
        ];
    }

    protected function getProps()
    {
        return [
            'html' => [
                'turbo' => true,

                'meta' => [
                    'turbo-cache-control' => 'no-preview',
                ],

                'google-fonts' => [
                    'families' => 'Nunito:wght@100;200;300;400;500;600;700;800;900',
                ],

                'components' => [
                    'tallkit-user-sidebar' => [
                        'disabled' => true,
                    ],
                ],
            ],

            'sidebar' => [
                'breakpoint' => 'lg',
                'name' => $this->guard ? $this->guard.'-sidebar' : 'sidebar',
            ],

            'toggler' => [
                'preset' => 'toggler',
                ':click' => '$dispatch(\''.($this->guard ? $this->guard.'-sidebar' : 'sidebar').'-toggle\')',
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
        ];
    }
}
