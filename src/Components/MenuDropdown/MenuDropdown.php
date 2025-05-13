<?php

namespace TALLKit\Components\MenuDropdown;

use TALLKit\View\BladeComponent;

class MenuDropdown extends BladeComponent
{
    protected array $props = [
        'items' => null,
        'inline' => false,
        'iconName' => null,
        'tooltip' => null,
        'name' => null,
        'show' => false,
        'overlay' => false,
        'closeable' => true,
        'align' => 'left'
    ];

    /*public function container()
    {
        return $this->attributes
            ->mergeOnlyThemeProvider($this->themeProvider, 'dropdown-aligns', $this->align)
            ->getAttributes();
        //'dropdown-aligns' => [
        //    'auto' => [
        //        'class' => '!static static',
        //        'style' => 'position: static;',
        //        '@open' => 'alignAuto',
        //        '@scroll.window' => 'close',
        //        '@resize.window' => 'close',
        //    ],
        //],
    }
    */

    protected function attrs()
    {
        return [
            'root' => [
                'class' => ' '.
                    ($this->align === 'top' ? 'top-0' : '').
                    ($this->align === 'left' ? 'left-0' : '').
                    ($this->align === 'right' ? 'right-0' : '').
                    ($this->align === 'bottom' ? 'bottom-0' : '').
                    ($this->align === 'top-left' ? 'top-0 left-0' : '').
                    ($this->align === 'top-right' ? 'top-0 right-0' : '').
                    ($this->align === 'bottom-left' ? 'bottom-0 left-0' : '').
                    ($this->align === 'bottom-right' ? 'bottom-0 right-0' : '').
                    '',
            ],

            'dropdown' => [
                'name' => $this->name,
                'show' => $this->show,
                'overlay' => $this->overlay,
                'closeable' => $this->closeable,
                'align' => $this->align,
                'name' => $this->name,
                //:theme:container="$container()"
            ],

            'trigger' => [
                '@click' => 'toggle',
                'class' => 'bg-white',
                'preset' => $this->trigger,
                'tooltip' => $this->tooltip
            ],

            'menu' => [
                'items' => $this->items,
                'inline' => $this->inline,
            ]
        ];
    }
}
