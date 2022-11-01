<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />

    <pre><!--
        --><code {{ $attributes->mergeThemeProvider($themeProvider, 'highlight') }}><!--
            -->{{ $slot->isEmpty() ? $code : $slot }}<!--
        --></code><!--
    --></pre>
</div>
