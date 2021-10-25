<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @isset($header)
        {{ $header }}
    @else
        <x-crud-header
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}
            :title="$title"
        >
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actions))
                {{ $actions }}
            @elseif($route = route_detect([$prefix.'.create', $prefix.'.new', $prefix.'.form'], $parameters, null))
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'create') }}
                    :href="$route"
                    preset="create"
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
        >
            @if ($displayActionsColumn)
                @scopedslot('actions', ($row), ($customActions, $prefix, $parameters, $attributes, $themeProvider))
                    <x-crud-actions
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}
                        :custom-actions="$customActions"
                        :prefix="$prefix"
                        :parameters="[...$parameters, $row]"
                    />
                @endscopedslot
            @endif
        </x-table>
    @endisset
</div>
