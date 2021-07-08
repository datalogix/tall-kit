<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeThemeProvider($themeProvider, 'aligns', $align)
    }}
>
    <x-dropdown
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dropdown') }}
        :name="$name"
        :show="$show"
        :overlay="$overlay"
        :align="$align"
        :theme="$theme"
    >
        <x-slot name="trigger">
            @isset ($trigger)
                {{ $trigger }}
            @else
                <button {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}>
                    <x-icon
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
                        :name="$iconName ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconName')->first()"
                    >
                        {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'iconSvg')->first() !!}
                    </x-icon>
                </button>
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
