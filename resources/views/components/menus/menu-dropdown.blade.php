<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
}}>
    <x-dropdown
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dropdown') }}
        :name="$name"
        :show="$show"
        :overlay="$overlay"
        :closeable="$closeable"
        :align="$align"
        :theme="$theme"
        :theme:container="$container()"
    >
        <x-slot name="trigger">
            @isset ($trigger)
                {{ $trigger }}
            @else
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}
                    preset="trigger"
                    :tooltip="$tooltip"
                    :theme="$theme"
                />
            @endisset
        </x-slot>

        <x-menu
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'menu') }}
            :items="$items"
            :inline="$inline"
            :theme="$theme"
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
        </x-menu>
    </x-dropdown>
</div>
