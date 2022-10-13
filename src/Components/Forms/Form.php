<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\BoundValues;

class Form extends BladeComponent
{
    use BoundValues;

    /**
     * @var bool
     */
    public $init;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string|bool|null
     */
    public $target;

    /**
     * @var string|string[]|null
     */
    public $route;

    /**
     * @var string|bool|null
     */
    public $action;

    /**
     * @var mixed
     */
    public $bind;

    /**
     * @var string|bool|null
     */
    public $modelable;

    /**
     * @var string|bool|null
     */
    public $enctype;

    /**
     * @var string|bool|null
     */
    public $confirm;

    /**
     * Form method spoofing to support PUT, PATCH and DELETE actions.
     * https://laravel.com/docs/master/routing#form-method-spoofing.
     *
     * @var bool
     */
    public $spoofMethod;

    /**
     * @var mixed
     */
    public $fields;

    /**
     * Create a new component instance.
     *
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|bool|null  $target
     * @param  string|bool|null  $action
     * @param  string|string[]|null  $route
     * @param  mixed  $bind
     * @param  string|bool|null  $modelable
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  mixed  $fields
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $init = null,
        $method = null,
        $target = null,
        $action = null,
        $route = null,
        $bind = null,
        $modelable = null,
        $enctype = null,
        $confirm = null,
        $fields = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->init = $init ?? true;
        $this->method = strtoupper($method ?? 'post');
        $this->target = $target;
        $this->action = $action ?? route_detect($route, $bind ?? $this->getBoundTarget(), null);
        $this->route = $route;
        $this->bind = $bind;
        $this->modelable = $modelable;
        $this->enctype = $enctype;
        $this->confirm = $confirm;
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
        $this->fields = $fields;

        $this->startFormDataBinder($this->bind, $this->modelable);
    }
}
