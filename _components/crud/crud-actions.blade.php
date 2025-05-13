@foreach ($actions as $route => $action)
    <x-dynamic-component
        :attributes="$attrs('custom')
            ->merge(['class' => target_get($action, 'class')])
            ->merge(['style' => target_get($action, 'style')])
            ->merge(target_get($action, ['attrs', 'attributes'], []))
        "
        :component="target_get($action, 'component', 'tallkit-button')"
        :text="target_get($action, 'tooltip', $tooltip) ? '' : target_get($action, ['name', 'title', 'text'], is_string($action) ? $action : null)"
        :active="target_get($action, 'active')"
        :href="target_get($action, 'component', 'button') === 'button' ? target_get($action, ['href', 'action', 'route']) : null"
        :action="target_get($action, 'component', 'button') === 'form-button' ? target_get($action, ['href', 'action', 'route']) : null"
        :route="target_get($action, 'route')"
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
        :props="$props('custom')"
        :theme="$theme"
    />
@endforeach

@if ($actionsMenuDropdown->count())
    <x-tallkit-menu-dropdown
        align="auto"
        :overlay="false"
        :text="$tooltip ? '' : null"
        :tooltip="$tooltip"
        :attributes="$attrs('menu-dropdown-container')"
        :props="$props('menu-dropdown-container')"
        :theme="$theme"
    >
        @foreach ($actionsMenuDropdown as $route => $action)
            <li>
                <x-dynamic-component
                    :attributes="$attrs('menu-dropdown')
                        ->merge(['class' => target_get($action, 'class')])
                        ->merge(['style' => target_get($action, 'style')])
                        ->merge(target_get($action, ['attrs', 'attributes'], []))
                    "
                    :component="target_get($action, 'component', 'tallkit-button')"
                    :text="target_get($action, ['name', 'title', 'text'], is_string($action) ? $action : null)"
                    :active="target_get($action, 'active')"
                    :href="target_get($action, 'component', 'button') === 'button' ? target_get($action, ['href', 'action', 'route']) : null"
                    :action="target_get($action, 'component', 'button') === 'form-button' ? target_get($action, ['href', 'action', 'route']) : null"
                    :route="target_get($action, 'route')"
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
                    :loading="target_get($action, 'loading', true)"
                    :preset="target_get($action, 'preset')"
                    :tooltip="target_get($action, 'tooltip')"
                    :props="$props('menu-dropdown')"
                    :theme="$theme"
                />
            </li>
        @endforeach

        @isset ($prepend)
            <x-slot name="prepend">
                {{ $prepend }}
            </x-slot>
        @endisset

        @isset ($append)
            <x-slot name="append">
                {{ $append }}
            </x-slot>
        @endisset
    </x-tallkit-menu-dropdown>
@endif
