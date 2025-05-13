<?php

namespace TALLKit\Components\Forms;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use TALLKit\View\Attr;

class Checkbox extends Field
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
            $this->checked = in_array($this->value, Arr::wrap($oldData));
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getFieldBoundValue($this->bind);

            if ($boundValue instanceof Collection && $firstItem = $boundValue->first()) {
                $boundValue = $boundValue->pluck($firstItem->getKeyName())->toArray();
            }

            if ($boundValue instanceof Arrayable) {
                $boundValue = $boundValue->toArray();
            }

            $this->checked = is_array($boundValue)
                ? in_array($this->value, $boundValue)
                : (is_null($boundValue) ? ($this->default ?? false) : $boundValue);
        }
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
                ],
                class: 'flex flex-col',
            ),

            'label-container' => Attr::make()
                ->class('flex items-center')
                ->when($this->groupable, fn ($attr) => $attr->class('mx-4 my-3'))
            ,

            'label' => [
                'class' => 'ml-3',
            ],

            'checkbox' => Attr::make(
                attributes: [
                    'type' => 'checkbox',
                    'value' => $this->value,
                ],
                class: 'h-4 w-4 border-gray-200 rounded-lg shadow shrink-0',
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
