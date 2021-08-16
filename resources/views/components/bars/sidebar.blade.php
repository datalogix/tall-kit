<x-drawer {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'drawer')
        ->merge($breakpointClasses(), false)
    }}
    :name="$name"
    :show="$show"
    :overlay="$overlay"
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
