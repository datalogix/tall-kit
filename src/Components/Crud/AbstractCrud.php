<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use TALLKit\Concerns\BoundValues;
use TALLKit\View\BladeComponent;

abstract class AbstractCrud extends BladeComponent
{
    use BoundValues;

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
     * @var mixed
     */
    public $resourceTitle;

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

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $prefix
     * @param  string|bool|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $model
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  bool|null  $forceMenu
     * @param  int|null  $maxActions
     * @param  mixed  $actions
     * @param  string|bool|null  $routeName
     * @param  string|bool|null  $tooltip
     * @param  array|null  $props
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
        $props = null
    ) {
        parent::__construct(props: $props);

        $this->prefix = $prefix;
        $this->key = $key;
        $this->title = $title;
        $this->parameters = Arr::wrap($parameters);
        $this->resource = $resource ?? $this->getBoundTarget();
        $this->resourceTitle = target_get($this->resource, ['title', 'name']);
        $this->forceMenu = $forceMenu;
        $this->maxActions = $maxActions ?? 4;
        $this->actions = Collection::make($actions);
        $this->routeName = $routeName;
        $this->tooltip = $tooltip;

        $parts = null;
        $route = Route::currentRouteName();

        if (! $this->prefix && ! Str::startsWith($route, 'livewire.')) {
            $parts = explode('.', $route);

            if (! $this->routeName) {
                $this->routeName = end($parts);
            }

            array_pop($parts);
            $this->prefix = implode('.', $parts);
        }

        if (! $this->routeName && ! Str::startsWith($route, 'livewire.')) {
            $parts = explode('.', $route);
            $this->routeName = end($parts);
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

        $this->model = $model ?? make_model($this->title);
    }
}
