<?php

namespace TALLKit\Components\Tab;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Tab extends BladeComponent
{
    protected array $props = [
        'selected' => 0,
        'mode' => 'border'
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'tab',
                setup: $this->selected,
            ),

            'heading' => Attr::make(
                attributes: ['role' => 'tablist'],
                class: 'flex',
            ),

            'item' => Attr::make(
                attributes: [
                    'preset' => 'none',
                    'x-html' => 'tab.header',
                    '@click' => 'setSelected(tab)',
                    'role' => 'tab',
                    ':class' => '{
                        \'' . ($this->mode === 'default' ? 'border-b-2 bg-white border-gray-500' : '') .
                        ($this->mode === 'border' ? 'border border-b-0 bg-white rounded-t' : '') . '\': isSelected(tab),
                        \'cursor-not-allowed\': isDisabled(tab),
                    }',
                ]
            ),

            'tabs' => Attr::make(
                attributes: ['x-ref' => 'tabs'],
                class: '' .
                    ($this->mode === 'default' ? '-mt-px border-t' : '') .
                    ($this->mode === 'border' ? '-mt-px border rounded-b' : '') .
                    '',
            ),

            'tab-item' => Attr::make(
                attributes: [
                    'x-show' => 'isSelected(tab)',
                    'x-html' => 'tab.content',
                ]
            ),
        ];
    }
}
