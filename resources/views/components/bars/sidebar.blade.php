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
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'ul') }}
            :items="$items"
            :inline="false"
            :theme="$theme"
            :theme:item="$item()"
        >
            @isset ($prepend)
                <x-slot name="prepend">
                    {{ $prepend }}
                </x-slot>
            @endisset

            @isset ($append)
                <x-slot name="append">
                    {{ $append }}
                </x-slot>
            @endisset

            {{ $slot }}
        </x-nav>

        {{ $footer ?? '' }}
    </nav>
</x-drawer>

@isset ($trigger)
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'trigger')
            ->merge(['@click' => '$dispatch(\''.$name.'-toggle\')'])
    }}>
        {{ $trigger }}
    </div>
@endisset
