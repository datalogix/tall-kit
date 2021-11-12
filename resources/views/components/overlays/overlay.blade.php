<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeThemeProvider($themeProvider, $closeable ? 'closeable' : null)
}}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'backdrop') }}></div>
</div>
