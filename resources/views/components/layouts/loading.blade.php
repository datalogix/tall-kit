<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <x-icon
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
        :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconName')->first()"
    >
        {!! $icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconSvg')->first() !!}
    </x-icon>

    @if ($slot->isNotEmpty() || $text)
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'text') }}>
            {!! $slot->isEmpty() ? __($text) : $slot !!}
        </span>
    @endif
</div>
