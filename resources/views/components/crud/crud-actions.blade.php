@foreach ($customActions as $route => $action)
    <x-button {{
            $attributes->mergeOnlyThemeProvider($themeProvider, 'custom')
                ->merge(data_get($action, 'attrs', []))
                ->merge(data_get($action, 'attributes', []))
        }}
        :text="data_get($action, 'text', $action)"
        :href="data_get($action, 'href', route_detect(data_get($action, 'href', true) ? $prefix.'.'.$route : $route, data_get($action, 'parameters', $parameters)))"
        :icon="data_get($action, 'icon')"
        :icon-left="data_get($action, 'icon-left')"
        :icon-right="data_get($action, 'icon-right')"
        :color="data_get($action, 'color')"
        :rounded="data_get($action, 'rounded')"
        :shadow="data_get($action, 'shadow')"
        :outlined="data_get($action, 'outlined')"
        :bordered="data_get($action, 'bordered')"
        :preset="data_get($action, 'preset')"
        :class="data_get($action, 'class')"
        :style="data_get($action, 'style')"
        :theme="$theme"
    />
@endforeach

@if (! in_array($routeName, ['show', 'view']) && $route = route_detect([$prefix.'.show', $prefix.'.view'], $parameters, null))
    <x-tooltip value="Show">
        <x-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'show') }}
            preset="show"
            text=""
            :href="$route"
            :theme="$theme"
        />
    </x-tooltip>
@endif

@if (! in_array($routeName, ['edit', 'update', 'form']) && $route = route_detect([$prefix.'.edit', $prefix.'.update', $prefix.'.form'], $parameters, null))
    <x-tooltip value="Edit">
        <x-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'edit') }}
            preset="edit"
            text=""
            :href="$route"
            :theme="$theme"
        />
    </x-tooltip>
@endif

@if (! in_array($routeName, ['copy', 'duplicate', 'clone']) && $route = route_detect([$prefix.'.copy', $prefix.'.duplicate', $prefix.'.clone'], $parameters, null))
    <x-tooltip value="Copy">
        <x-form-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'copy') }}
            preset="copy"
            text=""
            :action="$route"
            :theme="$theme"
        />
    </x-tooltip>
@endif

@if (! in_array($routeName, ['up', 'move-up']) && $route = route_detect([$prefix.'.up', $prefix.'.move-up'], $parameters, null))
    <x-tooltip value="Move up">
        <x-form-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'move-up') }}
            preset="move-up"
            text=""
            :action="$route"
            :theme="$theme"
        />
    </x-tooltip>
@endif

@if (! in_array($routeName, ['down', 'move-down']) && $route = route_detect([$prefix.'.down', $prefix.'.move-down'], $parameters, null))
    <x-tooltip value="Move down">
        <x-form-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'move-down') }}
            preset="move-down"
            text=""
            :action="$route"
            :theme="$theme"
        />
    </x-tooltip>
@endif

@if (! in_array($routeName, ['destroy', 'exclude']) && $route = route_detect([$prefix.'.destroy', $prefix.'.exclude'], $parameters, null))
    <x-tooltip value="Delete">
        <x-form-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'destroy') }}
            preset="delete"
            text=""
            :action="$route"
            :theme="$theme"
        />
    </x-tooltip>
@endif
