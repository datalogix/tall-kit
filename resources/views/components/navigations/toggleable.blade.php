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
            :theme="$theme"
        />
    @endif

    {{ $slot }}
</div>
