<x-toggleable
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :theme="$theme"
>
    @isset ($trigger)
        {{ $trigger }}
    @else
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}>
            {!! __('Clique to open (Provide your trigger)') !!}
        </div>
    @endisset

    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'dropdown')
            ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
    }}>
        {{ $slot }}
    </div>
</x-toggleable>
