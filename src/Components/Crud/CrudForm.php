<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Str;

class CrudForm extends Crud
{
    /**
     * @var string
     */
    public $method;

    /**
     * @var string|bool|null
     */
    public $action;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $prefix
     * @param  string|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  mixed  $customActions
     * @param  string|null  $routeName
     * @param  string|bool|null  $method
     * @param  string|bool|null  $action
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
        $method = null,
        $action = null,
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
            $theme
        );

        $this->title = $title ?? __(Str::title($this->resource ? 'edit' : 'create')) . ' ' . __($this->title);
        $this->method = $method ?? ($this->resource ? 'patch' : 'post');
        $this->action = $action ?? route_detect(
            $this->prefix.'.'.($this->resource ? 'update' : 'store'),
            [...$this->parameters, $this->resource],
            null
        );
    }
}
