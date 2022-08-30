<?php

namespace TALLKit\Components\Livewire\Crud;

use TALLKit\Concerns\LivewireDatatable;

class CrudIndex extends AbstractCrud
{
    use LivewireDatatable;

    /**
     * @var bool
     */
    public $displayIdColumn;

    /**
     * @var bool
     */
    public $displayActionsColumn;

    /**
     * @var bool
     */
    public $mapRelationsColumn;
}
