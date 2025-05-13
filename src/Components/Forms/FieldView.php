<?php

namespace TALLKit\Components\Forms;

class FieldView extends Field
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'value' => null,
            'bind' => null,
            'default' => null,
        ]);
    }

    protected function processed(array $data)
    {
        $this->default ??= __('---');
        $this->bind ??= $this->getBoundTarget();
    }

    protected function attrs()
    {
        return [
            'root' => [
                'name' => $this->name,
                'label' => $this->label,
                'label-wrapper' => $this->labelWrapper,
                'show-errors' => $this->showErrors,
                'groupable' => $this->groupable,
                'icon' => $this->icon,
                'icon-left' => $this->iconLeft,
                'icon-right' => $this->iconRight,
                'prepend' => $this->prepend,
                'append' => $this->append,
                'display' => false,
            ],

            'display' => [
                'value' => $this->value,
                'bind' => $this->bind,
                'name' => $this->name,
                'default' => $this->default,
                'class' => 'py-2 px-3 overflow-auto',
                'pt' => [
                    'img' => ['class' => 'mx-auto max-w-xs max-h-72'],
                    'audio' => ['class' => 'mx-auto max-w-xs max-h-72'],
                    'video' => ['class' => 'mx-auto max-w-xs max-h-72'],
                ]
            ],
        ];
    }
}
