<?php

namespace TALLKit\Components\Navbar;

use TALLKit\View\BladeComponent;

class Navbar extends BladeComponent
{
    protected array $props = [
        'items' => null,
        'inline' => true,
        'breakpoint' => null,
        'animated' => true,
        'align' => 'between',
        'logoImage' => null,
        'logoName' => null,
        'logoUrl' => null,
        'logoRoute' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => [
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'navbar\')',
                '@click.away' => 'close',
                '@click.outside' => 'close',
                '@keydown.escape.window' => 'close',
                'class' => 'flex flex-wrap items-center relative '.
                    ($this->align === 'start' ? 'justify-start' : '').
                    ($this->align === 'end' ? 'justify-end' : '').
                    ($this->align === 'center' ? 'justify-center' : '').
                    ($this->align === 'between' ? 'justify-between' : '').
                    ($this->align === 'around' ? 'justify-around' : '').
                    ($this->align === 'evenly' ? 'justify-evenly' : '').

                    ($this->breakpoint === 'sm' ? 'sm:flex-nowrap' : '').
                    ($this->breakpoint === 'md' ? 'md:flex-nowrap' : '').
                    ($this->breakpoint === 'lg' ? 'lg:flex-nowrap' : '').
                    ($this->breakpoint === 'xl' ? 'xl:flex-nowrap' : '').
                    ($this->breakpoint === '2xl' ? '2xl:flex-nowrap' : '').

                    '',
            ],

            'logo' => [
                'image' => $this->logoImage,
                'name' => $this->logoName,
                'url' => $this->logoUrl,
                'route' => $this->logoRoute,
            ],

            'toggler' => [
                'preset' => 'toggler',
                '@click' => 'toggle',
                'class' => ''.
                    ($this->breakpoint === 'sm' ? 'sm:hidden' : '').
                    ($this->breakpoint === 'md' ? 'md:hidden' : '').
                    ($this->breakpoint === 'lg' ? 'lg:hidden' : '').
                    ($this->breakpoint === 'xl' ? 'xl:hidden' : '').
                    ($this->breakpoint === '2xl' ? '2xl:hidden' : '').

                    '',
            ],

            'nav' => [
                'x-ref' => 'nav',
                ':class' => '{ \'hidden\': isClosed() }',
                ':style' => 'style()',
                'class' => 'w-full grow flex-col items-start max-h-0 '.
                    ($this->breakpoint === 'sm' ? 'sm:flex sm:w-auto sm:grow-0 sm:flex-row sm:items-center sm:max-h-full sm:relative' : '').
                    ($this->breakpoint === 'md' ? 'md:flex md:w-auto md:grow-0 md:flex-row md:items-center md:max-h-full md:relative' : '').
                    ($this->breakpoint === 'lg' ? 'lg:flex lg:w-auto lg:grow-0 lg:flex-row lg:items-center lg:max-h-full lg:relative' : '').
                    ($this->breakpoint === 'xl' ? 'xl:flex xl:w-auto xl:grow-0 xl:flex-row xl:items-center xl:max-h-full xl:relative' : '').
                    ($this->breakpoint === '2xl' ? '2xl:flex 2xl:w-auto 2xl:grow-0 2xl:flex-row 2xl:items-center 2xl:max-h-full 2xl:relative' : '').

                    ($this->animated ? 'transition-all' : '').
                    ($this->animated && $this->breakpoint === 'sm' ? 'sm:transition-none' : '').
                    ($this->animated && $this->breakpoint === 'md' ? 'md:transition-none' : '').
                    ($this->animated && $this->breakpoint === 'lg' ? 'lg:transition-none' : '').
                    ($this->animated && $this->breakpoint === 'xl' ? 'xl:transition-none' : '').
                    ($this->animated && $this->breakpoint === '2xl' ? '2xl:transition-none' : '').
                    '',

                // TODO
                //'theme:li' => [
                //    'class' => 'w-full',
                //],
            ],
        ];
    }
}
