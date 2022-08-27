@foreach ($actions as $route => $action)
    <x-dynamic-component {{
            $attributes->mergeOnlyThemeProvider($themeProvider, 'custom')
                ->merge(['class' => target_get($action, 'class')])
                ->merge(['style' => target_get($action, 'style')])
                ->merge(target_get($action, ['attrs', 'attributes'], []))
        }}
        :component="target_get($action, 'component', 'button')"
        :text="target_get($action, 'tooltip', $tooltip) ? '' : target_get($action, ['name', 'title', 'text'], is_string($action) ? $action : null)"
        :active="target_get($action, 'active')"
        :href="target_get($action, 'component', 'button') === 'button' ? target_get($action, ['href', 'action', 'route']) : null"
        :action="target_get($action, 'component', 'button') === 'form-button' ? target_get($action, ['href', 'action', 'route']) : null"
        :target="target_get($action, 'target')"
        :click="target_get($action, 'click')"
        :wire-click="target_get($action, 'wire-click')"
        :icon="target_get($action, 'icon')"
        :icon-left="target_get($action, 'icon-left')"
        :icon-right="target_get($action, 'icon-right')"
        :color="target_get($action, 'color')"
        :rounded="target_get($action, 'rounded')"
        :shadow="target_get($action, 'shadow')"
        :outlined="target_get($action, 'outlined')"
        :link-text="target_get($action, 'link-text')"
        :bordered="target_get($action, 'bordered')"
        :loading="target_get($action, 'loading')"
        :preset="target_get($action, 'preset')"
        :tooltip="target_get($action, ['tooltip', 'text'], $tooltip)"
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
                            ->merge(['class' => target_get($action, 'class')])
                            ->merge(['style' => target_get($action, 'style')])
                            ->merge(target_get($action, ['attrs', 'attributes'], []))
                    }}
                    :component="target_get($action, 'component', 'button')"
                    :text="target_get($action, ['name', 'title', 'text'], is_string($action) ? $action : null)"
                    :active="target_get($action, 'active')"
                    :href="target_get($action, 'component', 'button') === 'button' ? target_get($action, ['href', 'action', 'route']) : null"
                    :action="target_get($action, 'component', 'button') === 'form-button' ? target_get($action, ['href', 'action', 'route']) : null"
                    :target="target_get($action, 'target')"
                    :click="target_get($action, 'click')"
                    :wire-click="target_get($action, 'wire-click')"
                    :icon="target_get($action, 'icon')"
                    :icon-left="target_get($action, 'icon-left')"
                    :icon-right="target_get($action, 'icon-right')"
                    :color="target_get($action, 'color')"
                    :rounded="target_get($action, 'rounded', 'none')"
                    :shadow="target_get($action, 'shadow', 'none')"
                    :outlined="target_get($action, 'outlined')"
                    :link-text="target_get($action, 'link-text', true)"
                    :bordered="target_get($action, 'bordered')"
                    :loading="target_get($action, 'loading')"
                    :preset="target_get($action, 'preset')"
                    :tooltip="target_get($action, 'tooltip')"
                    :theme="$theme"
                />
            </li>
        @endforeach
    </x-menu-dropdown>
@endif
