<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;

abstract class Crud extends BladeComponent
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
     * @var array
     */
    public $parameters;

    /**
     * @var mixed
     */
    public $resource;

    /**
     * @var array
     */
    public $customActions;

    /**
     * @var string|bool|null
     */
    public $routeName;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $prefix
     * @param  string|bool|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  mixed  $customActions
     * @param  string|bool|null  $routeName
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
        $theme = null
    ) {
        parent::__construct($theme);

        $this->prefix = $prefix;
        $this->key = $key;
        $this->title = $title;
        $this->parameters = Arr::wrap($parameters);
        $this->resource = $resource;
        $this->customActions = Arr::wrap($customActions);
        $this->routeName = $routeName;

        $parts = null;

        if (! $this->prefix) {
            $parts = explode('.', Route::currentRouteName());

            if (! $this->routeName) {
                $this->routeName = end($parts);
            }

            array_pop($parts);
            $this->prefix = implode('.', $parts);
        }

        if (! $parts) {
            $parts = explode('.', $this->prefix);
        }

        if (! $this->key) {
            $this->key = end($parts);
        }

        if (is_null($this->title)) {
            $this->title = (string) Str::of($this->key)->replace('-', ' ')->singular()->title();
        }
    }
}
