<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\BoundValues;

class Form extends BladeComponent
{
    use BoundValues;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string|null
     */
    public $action;

    /**
     * @var string|null
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
     * Create a new component instance.
     *
     * @param  string  $method
     * @param  string|null  $action
     * @param  array|string|null  $route
     * @param  mixed  $bind
     * @param  string|null  $enctype
     * @param  string|bool|null  $confirm
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $method = 'POST',
        $action = null,
        $route = null,
        $bind = null,
        $enctype = null,
        $confirm = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->method = strtoupper($method);
        $this->action = $action;
        $this->enctype = $enctype;
        $this->confirm = $confirm;
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);

        if (is_null($this->action) && ! is_null($route)) {
            $this->action = route($route, $bind ?: $this->getBoundTarget());
        }
    }
}
