@foreach ($customActions as $route => $action)
    <x-button
        :text="$action['text'] ?? $action"
        :href="$action['href'] ?? route_detect(($action['prefix'] ?? true) ? $prefix.'.'.$route : $route, $action['parameters'] ?? $parameters)"
        :icon="$action['icon'] ?? null"
        :iconLeft="$action['iconLeft'] ?? null"
        :iconRight="$action['iconRight'] ?? null"
        :color="$action['color'] ?? null"
        :rounded="$action['rounded'] ?? null"
        :shadow="$action['shadow'] ?? null"
        :outlined="$action['outlined'] ?? null"
        :bordered="$action['bordered'] ?? null"
        :preset="$action['preset'] ?? null"
        :class="$action['class'] ?? null"
        :style="$action['style'] ?? null"
    />
@endforeach

@if ($routeName !== 'show' && $route = route_detect([$prefix.'.show', $prefix.'.view'], $parameters, null))
    <x-button
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'show') }}
        :href="$route"
        preset="show"
    />
@endif

@if ($routeName !== 'edit' && $route = route_detect([$prefix.'.edit', $prefix.'.update', $prefix.'.form'], $parameters, null))
    <x-button
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'edit') }}
        :href="$route"
        preset="edit"
    />
@endif

@if ($routeName !== 'destroy' && $route = route_detect([$prefix.'.destroy', $prefix.'.exclude'], $parameters, null))
    <x-form-button
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'destroy') }}
        :action="$route"
        preset="delete"
    />
@endif
