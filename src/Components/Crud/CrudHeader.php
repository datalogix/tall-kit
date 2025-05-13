<?php

namespace TALLKit\Components\Crud;

class CrudHeader extends AbstractCrud
{
    protected function attrs()
    {
        return [
            'root' => [
                'class' => 'flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 lg:items-center justify-between pb-4',
            ],

            'title' => [
                'class' => 'text-xl font-medium',
            ],

            'actions' => [
                'class' => 'flex space-x-2 items-center justify-end',
            ],
        ];
    }
}
