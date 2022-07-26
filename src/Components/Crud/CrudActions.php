<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Collection;

class CrudActions extends Crud
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $actionsMenuDropdown;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $prefix
     * @param  string|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  bool|null  $forceMenu
     * @param  int|null  $maxActions
     * @param  mixed  $actions
     * @param  string|bool|null  $routeName
     * @param  string|bool|null  $tooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $prefix = null,
        $key = null,
        $title = null,
        $parameters = null,
        $resource = null,
        $forceMenu = null,
        $maxActions = null,
        $actions = null,
        $routeName = null,
        $tooltip = null,
        $theme = null
    ) {
        parent::__construct(
            $prefix,
            $key,
            $title,
            $parameters,
            $resource,
            $forceMenu,
            $maxActions,
            $actions,
            $routeName,
            $tooltip,
            $theme
        );

        $this->actions = $this->actions->concat($this->getDefaultActions())->map(function ($action, $name) {
            return data_set($action, 'route', $this->getRoute($name, $action), false);
        })->filter(function ($action) {
            return $action['route'];
        });

        $exceededActions = $this->actions->count() > $this->maxActions;

        if ($this->forceMenu ?? ($this->key === 'show' && $exceededActions)) {
            $this->actionsMenuDropdown = $this->actions;
            $this->actions = Collection::make();
        } else {
            $this->actionsMenuDropdown = Collection::make();

            if ($exceededActions) {
                $this->actionsMenuDropdown = $this->actions->where('priority', false);
                $this->actions = $this->actions->where('priority', true);
            }
        }
    }

    /**
     * Get default actions.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getDefaultActions()
    {
        return Collection::make([
            'create' => [
                'component' => 'button',
                'preset' => 'create',
                'except' => ['index', 'create', 'new', 'form'],
                'routes' => [$this->prefix.'.create', $this->prefix.'.new', $this->prefix.'.form'],
                'priority' => false,
            ],

            'show' => [
                'component' => 'button',
                'preset' => 'show',
                'except' => ['show', 'view'],
                'priority' => false,
            ],

            'edit' => [
                'component' => 'button',
                'preset' => 'edit',
                'except' => ['edit', 'update', 'form'],
                'priority' => true,
            ],

            'copy' => [
                'component' => 'form-button',
                'preset' => 'copy',
                'except' => ['copy', 'duplicate', 'clone'],
                'priority' => false,
            ],

            'move-up' => [
                'component' => 'form-button',
                'preset' => 'move-up',
                'except' => ['move-up', 'up'],
                'priority' => true,
            ],

            'move-down' => [
                'component' => 'form-button',
                'preset' => 'move-down',
                'except' => ['move-down', 'down'],
                'priority' => true,
            ],

            'delete' => [
                'component' => 'form-button',
                'preset' => 'delete',
                'except' => ['delete', 'destroy', 'exclude'],
                'priority' => false,
            ],
        ]);
    }

    /**
     * Get route.
     *
     * @param  array  $action
     * @return string|false
     */
    protected function getRoute($name, $action = [])
    {
        $except = data_get($action, 'except', [$name]);

        if (in_array($this->routeName, $except)) {
            return false;
        }

        $prefix = data_get($action, 'prefix', true) ? $this->prefix.'.' : '';
        $parameters = data_get($action, 'parameters', $this->parameters);

        $routes = data_get($action, 'routes', array_map(function ($route) use ($prefix) {
            return $prefix.$route;
        }, $except));

        return route_detect($routes, $parameters, null);
    }
}
