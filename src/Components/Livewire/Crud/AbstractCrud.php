<?php

namespace TALLKit\Components\Livewire\Crud;

use TALLKit\Components\LivewireComponent;

abstract class AbstractCrud extends LivewireComponent
{
    /**
     * @var string
     */
    public $prefix;

    /**
     * @var string
     */
    public $key;

    /**
     * @var string|bool
     */
    public $title;

    /**
     * @var mixed
     */
    public $model;

    /**
     * @var array
     */
    public $parameters;

    /**
     * @var mixed
     */
    public $resource;

    /**
     * @var bool|null
     */
    public $forceMenu;

    /**
     * @var int|null
     */
    public $maxActions;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $actions;

    /**
     * @var string|bool|null
     */
    public $routeName;

    /**
     * @var string|bool|null
     */
    public $tooltip;
}
