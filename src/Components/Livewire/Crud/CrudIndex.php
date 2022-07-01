<?php

namespace TALLKit\Components\Livewire\Crud;

use TALLKit\Concerns\LivewireDatatable;

class CrudIndex extends Crud
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
