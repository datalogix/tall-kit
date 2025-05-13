<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\PrepareOptions;

class RadioList extends Group
{
    use PrepareOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'bind' => null,
            'modifier' => null,
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'name' => $this->name,
                'label' => $this->label,
                'inline' => $this->inline,
                'grid' => $this->grid,
                'fieldset' => $this->fieldset,
                'show-errors' => $this->showErrors
            ],

            'radio' => [
                'style' => 'margin: 0;',
                'name' => $this->name,
                'bind' => $this->bind,
                'modifier' => $this->modifier,
                'show-errors' => false
            ],
        ];
    }
}
