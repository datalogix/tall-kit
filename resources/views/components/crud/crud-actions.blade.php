@foreach ($actions as $route => $action)
    <x-dynamic-component {{
            $attributes->mergeOnlyThemeProvider($themeProvider, 'custom')
                ->merge(data_get($action, 'attrs', []))
                ->merge(data_get($action, 'attributes', []))
        }}
        :component="data_get($action, 'component', 'button')"
        :text="data_get($action, 'tooltip', $tooltip) ? '' : data_get($action, 'name', data_get($action, 'title', data_get($action, 'text', is_string($action) ? $action : null)))"
        :active="data_get($action, 'active')"
        :href="data_get($action, 'component', 'button') === 'button' ? data_get($action, 'href', data_get($action, 'action', data_get($action, 'route'))) : null"
        :action="data_get($action, 'component', 'button') === 'form-button' ? data_get($action, 'href', data_get($action, 'action', data_get($action, 'route'))) : null"
        :target="data_get($action, 'target')"
        :click="data_get($action, 'click')"
        :wire-click="data_get($action, 'wire-click')"
        :icon="data_get($action, 'icon')"
        :icon-left="data_get($action, 'icon-left')"
        :icon-right="data_get($action, 'icon-right')"
        :color="data_get($action, 'color')"
        :rounded="data_get($action, 'rounded')"
        :shadow="data_get($action, 'shadow')"
        :outlined="data_get($action, 'outlined')"
        :link-text="data_get($action, 'link-text')"
        :bordered="data_get($action, 'bordered')"
        :loading="data_get($action, 'loading')"
        :preset="data_get($action, 'preset')"
        :tooltip="data_get($action, 'tooltip', data_get($action, 'text', $tooltip))"
        :theme="$theme"
    />
@endforeach

@if ($actionsMenuDropdown->count())
    <x-menu-dropdown
        align="auto"
        :overlay="false"
        :text="$tooltip ? '' : null"
        :tooltip="$tooltip"
    >
        @foreach ($actionsMenuDropdown as $route => $action)
            <li>
                <x-dynamic-component {{
                        $attributes->mergeOnlyThemeProvider($themeProvider, 'menu-dropdown')
                            ->merge(data_get($action, 'attrs', []))
                            ->merge(data_get($action, 'attributes', []))
                    }}
                    :component="data_get($action, 'component', 'button')"
                    :text="data_get($action, 'name', data_get($action, 'title', data_get($action, 'text', is_string($action) ? $action : null)))"
                    :active="data_get($action, 'active')"
                    :href="data_get($action, 'component', 'button') === 'button' ? data_get($action, 'href', data_get($action, 'action', data_get($action, 'route'))) : null"
                    :action="data_get($action, 'component', 'button') === 'form-button' ? data_get($action, 'href', data_get($action, 'action', data_get($action, 'route'))) : null"
                    :target="data_get($action, 'target')"
                    :click="data_get($action, 'click')"
                    :wire-click="data_get($action, 'wire-click')"
                    :icon="data_get($action, 'icon')"
                    :icon-left="data_get($action, 'icon-left')"
                    :icon-right="data_get($action, 'icon-right')"
                    :color="data_get($action, 'color')"
                    :rounded="data_get($action, 'rounded', 'none')"
                    :shadow="data_get($action, 'shadow', 'none')"
                    :outlined="data_get($action, 'outlined')"
                    :link-text="data_get($action, 'link-text', true)"
                    :bordered="data_get($action, 'bordered')"
                    :loading="data_get($action, 'loading')"
                    :preset="data_get($action, 'preset')"
                    :tooltip="data_get($action, 'tooltip')"
                    :theme="$theme"
                />
            </li>
        @endforeach
    </x-menu-dropdown>
@endif
