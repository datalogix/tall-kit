<x-nav {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $inline ? 'inline' : 'outline')
    }}
    :items="$items"
    :inline="$inline"
    :theme="$theme"
>
    {{ $slot }}
</x-nav>
