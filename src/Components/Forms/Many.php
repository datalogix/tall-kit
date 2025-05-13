<?php

namespace TALLKit\Components\Forms;

class Many extends Group
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'inline' => false,
            'grid' => false,
            'fields' => null,
            'bind' => null,
            'allowEmpty' => null,
            'showHeaderCreate' => null,
            'cols' => null,
            'footer' => null,
            'tooltip' => true,
            'heading' => null,
            'labels' => null,
        ]);
    }
    protected function processed(array $data)
    {
        $this->fields = collect_value($this->fields)->map(function ($field, $key) {
            $field = is_array($field) ? $field : [
                'name' => is_int($key) ? $field : $key,
                'label' => is_string($field) ? $field : $key,
            ];

            data_set($field, 'label', target_get($field, 'name'), false);
            data_set($field, 'label', $this->labels ? target_get(is_iterable($this->labels) ? $this->labels : $field, 'label') : false);
            data_set($field, 'title', target_get($field, 'label'), false);
            data_set($field, 'x-model', 'item.'.target_get($field, 'name').'}}');
            data_set($field, 'fields', [$field]);

            return $field;
        });

        $this->label ??= $this->fields->count() > 1 ? $this->name : false;
        $this->fieldset ??= $this->allowEmpty ?? $this->label ?? $this->name;
        $this->showHeaderCreate ??= $this->allowEmpty ?? $this->fieldset && $this->fields->count() > 1;
        $this->cols = collect($this->cols ?? $this->fields);
        $this->heading ??= $this->allowEmpty ?? ! $this->fieldset || $this->fields->count() > 1;
        $this->labels ??= ! $this->heading;
    }

    protected function items()
    {
        return json_encode((object) $this->getFieldValue($this->bind, []));
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'many\')',
                'x-init' => 'setup('.$this->items().', '.$this->allowEmpty.')',
                'name' => $this->name,
                'label' => $this->label,
                'fieldset' => $this->fieldset,
                'show-errors' => $this->showErrors,
            ],

            'header-create' => [
                '@click' => 'create',
                'preset' => 'create',
            ],

            'table' => [
                'x-ref' => 'items',
                'cols' => $this->heading ? $this->cols->push('') : [],
                'footer' => $this->footer
            ],

            'row' => [
                'x-ref' => 'item',
            ],

            'td' => [],

            'field' => [
                'id' => false,

                'theme:container' => [
                    'class' => '!m-0 m-0',
                    'style' => 'margin: 0;',
                ],
            ],

            'actions' => [
                'class' => 'w-20',
            ],

            'create' => [
                'x-show' => 'showCreate(index)',
                '@click' => 'create',
                'preset' => 'create',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'delete' => [
                'x-show' => 'showRemove(index)',
                '@click' => 'remove(index)',
                'preset' => 'delete',
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],
        ];
    }
}
