<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($avatar)
        <img
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'image') }}
            src="{{ $avatar }}"
        />
    @endif

    @if ($icon !== false)
        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
            :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconName')->first()"
        >
            {!! $slot->isEmpty() ? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconSvg')->first() : $slot !!}
        </x-icon>
    @endif
</div>
