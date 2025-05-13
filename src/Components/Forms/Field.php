<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\FieldNameAndValue;
use TALLKit\Concerns\ValidationErrors;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Field extends BladeComponent
{
    use FieldNameAndValue;
    use ValidationErrors;

    protected array $props = [
        'name' => null,
        'label' => null,
        'labelWrapper' => true,
        'showErrors' => true,
        'groupable' => false,
        'display' => null,
        'icon' => null,
        'iconLeft' => null,
        'iconRight' => null,
        'prepend' => null,
        'append' => null,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(class: 'mb-4'),

            'label-container' => Attr::make(class: 'block'),

            'label' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'label' => $this->label
                ],
                class: 'mb-1'
            ),

            'field-group' => Attr::make(class: 'flex divide-x items-center border border-gray-200 bg-white rounded-lg shadow overflow-hidden focus-within:ring'),

            'field' => Attr::make(class: 'flex-1 w-full'),

            'icon-left' => Attr::make(attributes: ['name' => $this->iconLeft ?? $this->icon]),

            'icon-right' => Attr::make(attributes: ['name' => $this->iconRight]),

            'prepend' => Attr::make(class: 'py-2 px-3 flex items-center'),

            'append' => Attr::make(class: 'p-2 px-3 flex items-center'),

            'field-error' => Attr::make(
                attributes: ['name' => $this->getFieldName()],
            ),

            'display' => Attr::make(
                attributes: ['value' => $this->display],
                class: 'flex items-center justify-center my-4 text-center border border-gray-200 rounded shadow bg-white p-2 max-w-xs max-h-72'
            ),
        ];
    }
}
