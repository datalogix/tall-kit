<x-toggleable
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :theme="$theme"
>
    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'drawer')
            ->mergeThemeProvider($themeProvider, 'aligns', $align)

    }}>
        {{ $slot }}
    </div>
</x-toggleable>
