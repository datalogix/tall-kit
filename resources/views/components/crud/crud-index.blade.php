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

    @isset($datatable)
        {{ $datatable }}
    @else
        <x-datatable
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'datatable') }}
            :cols="$cols"
            :resource="$resource"
            :footer="$footer"
            :empty-text="$emptyText"
            :paginator="$paginator"
            :parse-cols="$parseCols"
            :parse-rows="$parseRows"
            :theme="$theme"
        >
            @if ($displayActionsColumn)
                @scopedslot('actions', ($row), ($customActions, $prefix, $parameters, $attributes, $themeProvider, $theme))
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'row-actions') }}>
                        <x-crud-actions
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}
                            :custom-actions="$customActions"
                            :prefix="$prefix"
                            :parameters="array_merge($parameters, [$row])"
                            :theme="$theme"
                        />
                    </div>
                @endscopedslot
            @endif

            @isset ($head)
                <x-slot name="head">
                    {{ $head }}
                </x-slot>
            @endisset

            @isset ($body)
                <x-slot name="body">
                    {{ $body }}
                </x-slot>
            @endisset

            @isset ($empty)
                <x-slot name="empty">
                    {{ $empty }}
                </x-slot>
            @endisset

            @isset ($foot)
                <x-slot name="foot">
                    {{ $foot }}
                </x-slot>
            @endisset
        </x-datatable>
    @endisset
</div>
