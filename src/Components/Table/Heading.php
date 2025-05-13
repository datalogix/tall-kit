<?php

namespace TALLKit\Components\Table;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Heading extends BladeComponent
{
    // TODO: review (styles, aligns)

    protected array $props = [
        'name' => null,
        'align' => 'left',
        'sortable' => null,
    ];

    protected function processed(array $data)
    {
        if ($this->sortable) {
            $orderBy = request()->str('orderBy')->lower();
            $orderByDirection = request()->str('orderByDirection', 'asc')->lower();

            $this->sortable = ($orderBy->is($this->name) ? $orderByDirection : str($this->sortable)->lower())->toString();
        }
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: ['scope' => 'col'],
                class: 'bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider',
            ),

            'content' => Attr::make(
                    attributes: $this->sortableAction(),
                    class: 'flex items-center py-4 px-6',
                )
                ->when($this->align === 'left', fn($attr) => $attr->class('text-left'))
                ->when($this->align === 'center', fn($attr) => $attr->class('text-center'))
                ->when($this->align === 'right', fn($attr) => $attr->class('text-right'))
                ->unless(! $this->sortable || ! isset($this->name), fn($attr) => $attr->class('cursor-pointer')),

            'sortable' => Attr::make()
                ->when($this->sortable === 'asc', fn($attr) => $attr->attr('icon', 'chevron-up'))
                ->when($this->sortable === 'desc', fn($attr) => $attr->attr('icon', 'chevron-down')),
        ];
    }

    protected function sortableAction()
    {
        if (! $this->sortable || ! isset($this->name)) {
            return [];
        }

        $sortable = $this->sortable === 'asc' ? 'desc' : 'asc';

        if ($this->isWired()) {
            return [
                'wire:click' => 'updateOrderBy(\''.$this->name.'\', \''.$sortable.'\')',
            ];
        }

        return [
            'href' => request()->fullUrlWithQuery([
                'orderBy' => $this->name,
                'orderByDirection' => $sortable,
            ]),
        ];
    }
}
