<x-button
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
    color="none"
    shadow="none"
    :theme="$theme"
>
    <x-icon
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
        :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-name')->first()"
    >
        {!! $slot->isEmpty() ? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-svg')->first() : $slot !!}
    </x-icon>
</x-button>
