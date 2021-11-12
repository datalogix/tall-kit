<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
    }}
>
    <x-dropdown
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dropdown') }}
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
                    :icon-left="$iconName ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconName')->first()"
                    :theme="$theme"
                >
                    <x-slot name="iconLeft">
                        {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'iconSvg')->first() !!}
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
