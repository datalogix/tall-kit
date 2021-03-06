<x-toggleable
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :theme="$theme"
>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}>
        {!! $trigger ?? __('Clique to open (Provide your trigger)') !!}
    </div>

    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'dropdown')
            ->mergeThemeProvider($themeProvider, 'aligns', $align)
    }}>
        {{ $slot }}
    </div>
</x-toggleable>
