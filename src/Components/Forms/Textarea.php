<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;

class Textarea extends Input
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'textarea',
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'label' => $this->label,
                    'show-errors' => $this->showErrors,
                    'groupable' => $this->groupable,
                    'icon-left' => $this->iconLeft ?? $this->icon,
                    'icon-right' => $this->iconRight,
                    'prepend' => $this->prepend,
                    'append' => $this->append,
                    'display' => $this->display,
                ],
            ),

            'textarea' => Attr::make(
                attributes: ['rows' => 5],
                class: 'block w-full py-2 px-3 outline-none focus:outline-none',
            )
                ->when($this->name, fn ($attr, $value) => $attr->attr('name', $value))
                ->when($this->id, fn ($attr, $value) => $attr->attr('id', $value))
                ->when(
                    $this->isModel() && $this->name,
                    fn ($attr) => $attr->attr('x-model' . $this->modelModifier($this->modifier), $this->modelName($this->name))
                )->when(
                    $this->isWired() && $this->name,
                    fn ($attr) => $attr->attr('wire:model' . $this->wireModifier($this->modifier), $this->name)
                )
        ];
    }
}
