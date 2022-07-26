<x-toggleable
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :theme="$theme"
>
    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'drawer')
            ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
    }}>
        {{ $slot }}
    </div>
</x-toggleable>
