<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <x-icon
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
        :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-name')->first()"
    >
        {!! $icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-svg')->first() !!}
    </x-icon>

    @if ($slot->isNotEmpty() || $text)
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'text') }}>
            {!! $slot->isEmpty() ? __($text) : $slot !!}
        </span>
    @endif
</div>
