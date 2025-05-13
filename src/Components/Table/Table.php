<?php

namespace TALLKit\Components\Table;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Table extends BladeComponent
{
    protected array $props = [
        'cols' => null,
        'rows' => null,
        'footer' => null,
        'emptyText' => null,
    ];

    protected function processed(array $data)
    {
        $this->cols = collect($this->cols);
        $this->rows = collect($this->rows);
        $this->footer = collect($this->footer);

        if ($this->cols->isEmpty() && $this->rows->isNotEmpty()) {
            $this->cols = collect($this->rows->first())->keys();
        }
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(class: 'shadow rounded-lg overflow-y-auto border-b border-gray-200 my-4'),

            'table' => Attr::make(class: 'min-w-full divide-y divide-gray-200'),

            'thead' => Attr::make(),

            'th' => Attr::make(),

            'tbody' => Attr::make(class: 'bg-white divide-y divide-gray-200'),

            'tr' => Attr::make(),

            'td' => Attr::make(),

            'tfoot' => Attr::make(),

            'empty-text' => Attr::make(class: 'px-6 py-4 whitespace-nowrap text-lg text-gray-500 text-center'),

            'display' => Attr::make(
                pt: [
                    'img' => 'mx-auto max-w-xs max-h-40',
                    'audio' => 'mx-auto max-w-xs max-h-40',
                    'video' => 'mx-auto max-w-xs max-h-40',
                    'check' => 'mx-auto',
                    'uncheck' => 'mx-auto',
                ],
            ),
        ];
    }
}
