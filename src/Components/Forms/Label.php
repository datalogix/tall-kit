<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Label extends BladeComponent
{
    protected array $props = [
        'name' => null,
        'label' => null
    ];

    protected function processed(array $data)
    {
        $this->label ??= (string) $this->getLabel()->title();
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(class: 'block')
        ];
    }

    protected function getLabel()
    {
        $label = str($this->name)->before('[]');

        if (!$label->contains('.')) {
            return $label;
        }

        if ($label->afterLast('.')->is('id')) {
            return $label->replace('.', '_');
        }

        return $label->afterLast('.');
    }
}
