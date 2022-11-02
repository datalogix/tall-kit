<div {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$code.')'])
}}>
    <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />

    <pre {{ $attributes->mergeThemeProvider($themeProvider, 'pretty-print-json') }}></pre>
</div>
