<?php

namespace TALLKit\Components\Crud;

use Illuminate\Support\Facades\Gate;

class CrudActions extends AbstractCrud
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'actionsMenuDropdown' => null,
        ]);
    }

    protected function processed(array $data)
    {
        $this->actions = collect_value($this->actions->union($this->getDefaultActions()))
            ->map(function ($action, $name) {
                return data_set($action, 'route', $this->getRoute($name, $action), false);
            })->filter(function ($action) {
                return $action['route'];
            })->filter(function ($action, $name) {
                $abilities = target_get($action, ['can', 'abilities', 'except'], [$name]);

                return Gate::check($abilities, $this->resource);
            });

            /*
             <x-dynamic-component
        :component="target_get($action, 'component', 'tallkit-button')"
        :text="target_get($action, 'tooltip', $tooltip) ? '' : target_get($action, ['name', 'title', 'text'], is_string($action) ? $action : null)"
        :tooltip="target_get($action, ['tooltip', 'text'], $tooltip)"
        :attributes="$attr('custom')->merge(is_array($action) ? Arr::except($action, ['text', 'tooltip']) : [])"
    />*/

        $exceededActions = $this->actions->count() > $this->maxActions;

        if ($this->forceMenu ?? ($this->key === 'show' && $exceededActions)) {
            $this->actionsMenuDropdown = $this->actions;
            $this->actions = collect();
        } else {
            $this->actionsMenuDropdown = collect();

            if ($exceededActions) {
                $this->actionsMenuDropdown = $this->actions->where('priority', false);
                $this->actions = $this->actions->where('priority', true);
            }
        }
        /*

        :component="target_get($action, 'component', 'tallkit-button')"
        :text="target_get($action, ['name', 'title', 'text'], is_string($action) ? $action : null)"
        :rounded="target_get($action, 'rounded', 'none')"
        :shadow="target_get($action, 'shadow', 'none')"
        :link-text="target_get($action, 'link-text', true)"
        :loading="target_get($action, 'loading', true)"
        :attributes="$attr('menu-dropdown-item')->merge(is_array($action) ? Arr::except($action, ['text', 'rounded', 'shadow', 'link-text', 'loading']) : [])"
         */
    }

    protected function attrs()
    {
        return [
            'custom' => [],

            'menu-dropdown' => [
                'align' => 'auto',
                'overlay' => false,
                'text' => $this->tooltip ? '' : null,
                'tooltip' => $this->tooltip
            ],

            'menu-dropdown-item' => [
                'class' => 'w-full',

                'theme:container' => [
                    'class' => 'w-full',
                ],
            ],

            'show' => [],

            'edit' => [],

            'copy' => [],

            'move-up' => [],

            'move-down' => [],

            'destroy' => [],
        ];
    }

    protected function getDefaultActions()
    {
        return collect([
            'create-many' => [
                'component' => 'tallkit-button',
                'preset' => 'create-many',
                'except' => ['index', 'create-many', 'new-many', 'form-many'],
                'routes' => [$this->prefix.'.create-many', $this->prefix.'.new-many', $this->prefix.'.form-many'],
                'priority' => false,
            ],

            'create' => [
                'component' => 'tallkit-button',
                'preset' => 'create',
                'except' => ['index', 'create', 'new', 'form'],
                'routes' => [$this->prefix.'.create', $this->prefix.'.new', $this->prefix.'.form'],
                'priority' => false,
            ],

            'show' => [
                'component' => 'tallkit-button',
                'preset' => 'show',
                'except' => ['show', 'view'],
                'priority' => false,
            ],

            'download' => [
                'component' => 'tallkit-button',
                'target' => '_blank',
                'preset' => 'download',
                'except' => ['download'],
                'priority' => false,
            ],

            'download-execute' => [
                'component' => 'tallkit-form-button',
                'target' => '_blank',
                'preset' => 'download',
                'except' => ['download-execute'],
                'priority' => false,
            ],

            'edit' => [
                'component' => 'tallkit-button',
                'preset' => 'edit',
                'except' => ['edit', 'update', 'form'],
                'priority' => true,
            ],

            'copy' => [
                'component' => 'tallkit-form-button',
                'preset' => 'copy',
                'except' => ['copy', 'duplicate', 'clone'],
                'priority' => false,
            ],

            'duplicate' => [
                'component' => 'tallkit-form-button',
                'preset' => 'duplicate',
                'except' => ['copy', 'duplicate', 'clone'],
                'priority' => false,
            ],

            'move-up' => [
                'component' => 'tallkit-form-button',
                'preset' => 'move-up',
                'except' => ['move-up', 'up'],
                'priority' => true,
            ],

            'move-down' => [
                'component' => 'tallkit-form-button',
                'preset' => 'move-down',
                'except' => ['move-down', 'down'],
                'priority' => true,
            ],

            'delete' => [
                'component' => 'tallkit-form-button',
                'preset' => 'delete',
                'except' => ['delete', 'destroy', 'exclude'],
                'priority' => false,
            ],
        ]);
    }

    protected function getRoute($name, $action = [])
    {
        $except = target_get($action, 'except', [$name]);

        if (in_array($this->routeName, $except)) {
            return false;
        }

        $prefix = target_get($action, 'prefix', true) ? $this->prefix.'.' : '';
        $parameters = target_get($action, 'parameters', $this->parameters);

        $routes = target_get($action, 'routes', array_map(function ($route) use ($prefix) {
            return $prefix.$route;
        }, $except));

        return route_detect($routes, $parameters, null);
    }
}
