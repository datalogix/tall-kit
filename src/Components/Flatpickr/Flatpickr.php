<?php

namespace TALLKit\Components\Flatpickr;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;

class Flatpickr extends Input
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'text',
            'format' => __('m/d/Y H:i'),
            'placeholder' => null,
            'options' => [
                // See https://flatpickr.js.org/options/
                'enableTime' => true,
            ],
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-data' => 'window.tallkit.component(\'flatpickr\')',
                'x-ref' => 'input',
                'x-init' => 'setup('.$this->jsonOptions().')',
                'autocomplete' => 'off',
                'text' => $this->text,
                'name' => $this->name,
                'id' => $this->id,
                'label' => $this->label,
                'modifier' => $this->modifier,
                'show-errors' => $this->showErrors,
                'groupable' => $this->groupable,
                'icon' => $this->icon,
                'icon-left' => $this->iconLeft,
                'icon-right' => $this->iconRight,
                'prepend' => $this->prepend,
                'append' => $this->append,
                'display' => $this->display,
                'value' => $this->value,
                'bind' => $this->bind,
                'placeholder' => $this->placeholder ?? $this->format,
            ],
        ];
    }

    protected function getOptionsValues()
    {
        return ['dateFormat' => $this->format];
    }
}
