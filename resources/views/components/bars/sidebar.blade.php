<x-drawer {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'drawer')
        ->merge($themeProvider->breakpoints->get($breakpoint, []), false)
    }}
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :align="$align"
    :theme="$theme"
    :theme:container="$container()"
>
    <nav {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'nav') }}>
        {{ $header ?? '' }}

        <x-nav
            :items="$items"
            :inline="false"
            :theme="$theme"
            :theme:item="$item()"
        >
            {{ $slot }}
        </x-nav>

        {{ $footer ?? '' }}
    </nav>
</x-drawer>
