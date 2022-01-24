<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;

class CrudForm extends Crud
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
     * @var string|bool|null
     */
    public $action;

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
     * Create a new component instance.
     *
     * @param  string|null  $prefix
     * @param  string|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  mixed  $customActions
     * @param  string|bool|null  $routeName
     * @param  string|bool|null  $tooltip
     * @param  bool|null  $init
     * @param  string|null  $method
     * @param  string|bool|null  $action
     * @param  string|bool|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  mixed  $fields
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $prefix = null,
        $key = null,
        $title = null,
        $parameters = null,
        $resource = null,
        $customActions = null,
        $routeName = null,
        $tooltip = null,
        $init = null,
        $method = null,
        $action = null,
        $enctype = null,
        $confirm = null,
        $fields = null,
        $theme = null
    ) {
        parent::__construct(
            $prefix,
            $key,
            $title,
            $parameters,
            $resource,
            $customActions,
            $routeName,
            $tooltip,
            $theme
        );

        $this->title = $title ?? __(Str::title($this->resource ? 'edit' : 'create')).' '.__($this->title);
        $this->init = $init;
        $this->method = $method ?? ($this->resource ? 'patch' : 'post');
        $this->action = $action ?? route_detect(
            $this->prefix.'.'.($this->resource ? 'update' : 'store'),
            array_merge($this->parameters, [$this->resource]),
            null
        );
        $this->enctype = $enctype;
        $this->confirm = $confirm;
        $this->fields = $fields;
    }
}
