<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;

class CrudForm extends AbstractCrud
{
    /**
     * @var bool
     */
    public $init;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string|string[]|null
     */
    public $route;

    /**
     * @var string|bool|null
     */
    public $action;

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
     * @var mixed
     */
    public $fields;

    /**
     * @var string|bool|null
     */
    public $back;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $prefix
     * @param  string|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $model
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  bool|null  $forceMenu
     * @param  int|null  $maxActions
     * @param  mixed  $actions
     * @param  string|bool|null  $routeName
     * @param  string|bool|null  $tooltip
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|string[]|null  $route
     * @param  string|bool|null  $action
     * @param  string|bool|null  $modelable
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  mixed  $fields
     * @param  string|bool|null  $back
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $prefix = null,
        $key = null,
        $title = null,
        $model = null,
        $parameters = null,
        $resource = null,
        $forceMenu = null,
        $maxActions = null,
        $actions = null,
        $routeName = null,
        $tooltip = null,
        $init = null,
        $method = null,
        $route = null,
        $action = null,
        $modelable = null,
        $enctype = null,
        $confirm = null,
        $fields = null,
        $back = null,
        $theme = null
    ) {
        parent::__construct(
            $prefix,
            $key,
            $title,
            $model,
            $parameters,
            $resource,
            $forceMenu,
            $maxActions,
            $actions,
            $routeName,
            $tooltip,
            $theme
        );

        $this->title = $title ?? __(Str::title($this->resource ? 'edit' : 'create')).' '.__($this->title);
        $this->init = $init;
        $this->method = $method ?? ($this->resource ? 'patch' : 'post');
        $this->route = $route ?? $this->prefix.'.'.($this->resource ? 'update' : 'store');
        $this->action = $action ?? route_detect($this->route, array_filter([...$this->parameters, $this->resource]), null);
        $this->modelable = $modelable;
        $this->enctype = $enctype;
        $this->confirm = $confirm;
        $this->fields = $fields;
        $this->back = $back ?? (url()->current() === url()->previous() ? route_detect($this->prefix.'.index', $this->parameters, null) : null);

        $this->startFormDataBinder($this->resource, $this->modelable);
    }
}
