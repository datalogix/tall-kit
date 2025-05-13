<?php

namespace TALLKit\Components\FormButton;

use TALLKit\Components\Forms\Form;
use TALLKit\View\Attr;

class FormButton extends Form
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'preset' => null,
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'init' => $this->init,
                    'method' => $this->preset === 'delete' ? 'delete' : $this->method,
                    'target' => $this->target,
                    'route' => $this->route,
                    'action' => $this->action,
                    'bind' => $this->bind,
                    'modelable' => $this->modelable,
                    'enctype' => $this->enctype,
                    'confirm' => $this->confirm,
                    'fields' => $this->fields,
                ],
                class: 'inline-block'
            ),

            'submit' => [
                'preset' => $this->preset
            ],
        ];
    }
}
