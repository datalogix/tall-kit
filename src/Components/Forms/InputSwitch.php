<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;

class InputSwitch extends Checkbox
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'activeColor' => 'blue',
            'deactiveColor' => 'gray',
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'label' => false,
                    'show-errors' => $this->showErrors,
                    'groupable' => $this->groupable,
                    'icon' => $this->icon,
                    'icon-left' => $this->iconLeft,
                    'icon-right' => $this->iconRight,
                    'prepend' => $this->prepend,
                    'append' => $this->append,
                    'display' => $this->display,
                    'value' => $this->value,
                    'checked' => $this->checked,
                    'bind' => $this->bind,
                    'modifier' => $this->modifier,
                    'default' => $this->default,
                ],
                pt: [
                    'label-container' => [
                        'class' => 'relative cursor-pointer',
                    ],

                    'checkbox' => [
                        'class' => 'sr-only peer',
                    ],
                ],
            ),

            'switch' => Attr::make(
                class: '
                    w-14 h-8
                    border
                    rounded-full
                    peer
                    peer-focus:outline-none
                    peer-focus:ring
                    peer-focus:ring-'.$this->activeColor.'-300
                    peer-checked:after:translate-x-full
                    peer-checked:after:border-white
                    after:content-[\'\']
                    after:absolute
                    after:top-[4px]
                    after:left-[4px]
                    after:bg-white
                    after:border-gray-300
                    after:border
                    after:rounded-full
                    after:h-6
                    after:w-6
                    after:transition-all
                    peer-checked:bg-'.$this->activeColor.'-600
                    bg-'.$this->deactiveColor.'-200',
            ),
        ];
    }
}
