<div {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
    }}
>
    <x-dropdown
        {{ $attributes->mergeThemeProvider($themeProvider, 'dropdown') }}
        :name="$name"
        :show="$show"
        :overlay="$overlay"
        :closeable="$closeable"
        :align="$align"
        :theme="$theme"
    >
        <x-slot name="trigger">
            @isset ($trigger)
                {{ $trigger }}
            @else
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}
                    color="none"
                    rounded="full"
                    :icon-left="$iconName ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-name')->first()"
                    :tooltip="$tooltip"
                    :theme="$theme"
                >
                    <x-slot name="iconLeft">
                        {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-svg')->first() !!}
                    </x-slot>
                </x-button>
            @endisset
        </x-slot>

        <x-menu
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'menu') }}
            :items="$items"
            :inline="$inline"
            :theme="$theme"
        >
            {{ $slot }}
        </x-menu>
    </x-dropdown>
</div>
