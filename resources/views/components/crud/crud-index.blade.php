<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @isset($header)
        {{ $header }}
    @else
        <x-crud-header
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}
            :title="$title"
            :theme="$theme"
        >
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actions))
                {{ $actions }}
            @elseif($route = route_detect([$prefix.'.create', $prefix.'.new', $prefix.'.form'], $parameters, null))
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'create') }}
                    preset="create"
                    :href="$route"
                    :theme="$theme"
                />
            @endisset
        </x-crud-header>
    @endisset

    {{ $slot }}

    @isset($table)
        {{ $table }}
    @else
        <x-table
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'table') }}
            :cols="$cols"
            :rows="$resource"
            :theme="$theme"
        >
            @if ($displayActionsColumn)
                @scopedslot('actions', ($row), ($customActions, $prefix, $parameters, $attributes, $themeProvider, $theme))
                    <x-crud-actions
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}
                        :custom-actions="$customActions"
                        :prefix="$prefix"
                        :parameters="array_merge($parameters, [$row])"
                        :theme="$theme"
                    />
                @endscopedslot
            @endif
        </x-table>
    @endisset
</div>
