<?php

namespace TALLKit\Components\Forms;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use TALLKit\Concerns\PrepareOptions;
use TALLKit\View\Attr;

class Select extends Input
{
    use PrepareOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'select',
            'options' => null,
            'itemValue' => null,
            'itemText' => null,
            'multiple' => false,
            'emptyOption' => true,
        ]);
    }

    protected function processed(array $data)
    {
        $this->setOptions($this->options, $this->itemValue, $this->itemText);

        parent::processed($data);
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

            'select' => Attr::make(
                class: 'block w-full py-2 px-3 outline-none focus:outline-none',
            )
            ->when($this->name, fn ($attr, $value) => $attr->attr('name', $value))
            ->when(
                $this->isModel() && $this->name,
                fn ($attr) => $attr->attr('x-model' . $this->modelModifier($this->modifier), $this->modelName($this->name))
            )->when(
                $this->isWired() && $this->name,
                fn ($attr) => $attr->attr('wire:model' . $this->wireModifier($this->modifier), $this->name)
            )
            ->when($this->multiple, fn ($attr, $value) => $attr->attr('multiple', $value))
            ->when($this->choices, fn ($attr) => $attr->merge(Attr::make(
                attributes: ['x-ref' => 'element'],
                component: 'choices',
                setup: json_encode((object) (is_array($this->choices) ? $this->choices : []))
            ))),
        ];
    }

    protected function formatValue($value)
    {
        if ($value instanceof Collection) {
            return $value->pluck($this->itemValue)->toArray();
        }

        if ($value instanceof Arrayable) {
            return $value->toArray();
        }

        return $value;
    }

    public function isSelected($key = null)
    {
        if ($this->isWired()) {
            return false;
        }

        if (is_null($key)) {
            return empty(Arr::wrap($this->value));
        }

        return in_array($key, Arr::wrap($this->value));
    }
}
