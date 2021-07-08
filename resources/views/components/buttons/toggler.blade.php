<x-button
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
    color="none"
    shadow="none"
    :theme="$theme"
>
    <x-icon
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
        :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconName')->first()"
    >
        {!! $slot->isEmpty() ? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconSvg')->first() : $slot !!}
    </x-icon>
</x-button>
