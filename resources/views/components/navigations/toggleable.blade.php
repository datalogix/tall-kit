<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$show.')'])
        ->merge($events())
    }}
>
    @if ($overlay)
        <x-overlay
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'overlay') }}
            :closeable="$closeable"
            :theme="$theme"
        />
    @endif

    {{ $slot }}
</div>
