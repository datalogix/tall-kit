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
    <x-navbar
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'navbar') }}
        :items="$items"
        :theme="$theme"
    >
        @isset ($header)
            <x-slot name="header">
                {{ $header }}
            </x-slot>
        @endisset

        @isset ($footer)
            <x-slot name="footer">
                {{ $footer }}
            </x-slot>
        @endisset

        {{ $slot }}
    </x-navbar>
</x-drawer>
