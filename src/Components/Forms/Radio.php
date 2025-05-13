<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;

class Radio extends Field
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'value' => 1,
            'checked' => false,
            'bind' => null,
            'modifier' => null,
            'default' => null,
        ]);
    }

    protected function processed(array $data)
    {
        if ($oldData = $this->oldFieldValue()) {
            $this->checked = $oldData == $this->value;
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getFieldBoundValue($this->bind);

            $this->checked = is_null($boundValue)
                ? ($this->default ?? false)
                : $boundValue == $this->value;
        }
    }

    protected function getAttrs()
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
                ],
            ),

            'label-container' => Attr::make()
                ->class('flex items-center')
                ->when($this->groupable, fn ($attr) => $attr->class('mx-4 my-3'))
            ,

            'label' => [
                'class' => 'ml-3',
            ],

            'radio' => Attr::make(
                attributes: [
                    'type' => 'radio',
                    'value' => $this->value,
                ],
                class: 'h-4 w-4 border-gray-200 shadow',
            )->when($this->name, fn ($attr, $value) => $attr->attr('name', $value))
            ->when($this->checked, fn ($attr, $value) => $attr->attr('checked', 'checked'))
            ->when(
                $this->isModel() && $this->name,
                fn ($attr) => $attr->attr('x-model' . $this->modelModifier($this->modifier), $this->modelName($this->name))
            )->when(
                $this->isWired() && $this->name,
                fn ($attr) => $attr->attr('wire:model' . $this->wireModifier($this->modifier), $this->name)
            ),
        ];
    }
}
