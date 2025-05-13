<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;

class Group extends Field
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'inline' => false,
            'grid' => null,
            'fieldset' => null,
        ]);
    }

    protected function attrs()
    {
        $type = 'block';

        if ($this->grid ?? false) {
            $type = 'grid-' . ($this->grid === true ? 1 : $this->grid);
        }

        if ($this->inline ?? false) {
            $type = 'inline';
        }

        return [
            'root' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'label' => false,
                    'show-errors' => $this->showErrors,
                    'groupable' => $this->groupable,
                    'icon-left' => $this->iconLeft ?? $this->icon,
                    'icon-right' => $this->iconRight,
                    'prepend' => $this->prepend,
                    'append' => $this->append,
                    'display' => $this->display,
                ]
            ),

            'label' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'label' => $this->label
                ],
                class: 'mb-1',
            ),

            'fieldset' => [
                'class' => 'bg-white border p-6 rounded-lg shadow overflow-auto ' .
                    ($type === 'block' ? '' : '') .
                    ($type === 'inline' ? 'flex flex-wrap space-x-6' : '') .
                    ($type === 'grid-1' ? 'grid gap-6 grid-cols-1' : '') .
                    ($type === 'grid-2' ? 'grid gap-6 grid-cols-2' : '') .
                    ($type === 'grid-3' ? 'grid gap-6 grid-cols-3' : '') .
                    ($type === 'grid-4' ? 'grid gap-6 grid-cols-4' : '') .
                    ($type === 'grid-5' ? 'grid gap-6 grid-cols-5' : '') .
                    ($type === 'grid-6' ? 'grid gap-6 grid-cols-6' : '') .
                    ($type === 'grid-7' ? 'grid gap-6 grid-cols-7' : '') .
                    ($type === 'grid-8' ? 'grid gap-6 grid-cols-8' : '') .
                    ($type === 'grid-9' ? 'grid gap-6 grid-cols-9' : '') .
                    ($type === 'grid-10' ? 'grid gap-6 grid-cols-10' : '') .
                    ($type === 'grid-11' ? 'grid gap-6 grid-cols-11' : '') .
                    ($type === 'grid-12' ? 'grid gap-6 grid-cols-12' : '') .
                    '',
            ],

            'div' => Attr::make(
                class: ($type === 'block' ? '' : '') .
                    ($type === 'inline' ? 'flex flex-wrap space-x-6' : '') .
                    ($type === 'grid-1' ? 'grid gap-6 grid-cols-1' : '') .
                    ($type === 'grid-2' ? 'grid gap-6 grid-cols-2' : '') .
                    ($type === 'grid-3' ? 'grid gap-6 grid-cols-3' : '') .
                    ($type === 'grid-4' ? 'grid gap-6 grid-cols-4' : '') .
                    ($type === 'grid-5' ? 'grid gap-6 grid-cols-5' : '') .
                    ($type === 'grid-6' ? 'grid gap-6 grid-cols-6' : '') .
                    ($type === 'grid-7' ? 'grid gap-6 grid-cols-7' : '') .
                    ($type === 'grid-8' ? 'grid gap-6 grid-cols-8' : '') .
                    ($type === 'grid-9' ? 'grid gap-6 grid-cols-9' : '') .
                    ($type === 'grid-10' ? 'grid gap-6 grid-cols-10' : '') .
                    ($type === 'grid-11' ? 'grid gap-6 grid-cols-11' : '') .
                    ($type === 'grid-12' ? 'grid gap-6 grid-cols-12' : '') .
                    '',
            ),
        ];
    }
}
