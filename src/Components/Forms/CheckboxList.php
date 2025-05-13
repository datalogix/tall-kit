<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\PrepareOptions;

class CheckboxList extends Group
{
    use PrepareOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'bind' => false,
            'modifier' => null,
            'selectAll' => null,
            'deselectAll' => null,
        ]);
    }

    protected function processed(array $data)
    {
        $this->selectAll ??= $this->fieldset;
        $this->deselectAll ??= $this->fieldset;
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-data' => 'window.tallkit.component(\'checkbox-list\')',
                'x-init' => 'setup(\''.$this->name.'\')',
            ],

            'group' => [
                'name' => $this->name,
                'label' => $this->label,
                'inline' => $this->inline,
                'grid' => $this->grid,
                'fieldset' => $this->fieldset,
                'show-errors' => $this->showErrors
            ],

            'header' => [
                'class' => 'flex items-center justify-between',
            ],

            'label' => [
                'label' => $this->label
            ],

            'actions' => [],

            'select-all' => [
                'preset' => 'select-all',
                '@click' => 'select(true)',
            ],

            'deselect-all' => [
                'preset' => 'deselect-all',
                '@click' => 'select(false)',
            ],

            'checkbox' => [
                'style' => 'margin: 0;',
                'name' => $this->name,
                'bind' => $this->bind,
                'modifier' => $this->modifier,
                'show-errors' => false
            ],
        ];
    }
}
