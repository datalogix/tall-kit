<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <h2 {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
        {!! __($title) !!}
    </h2>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}>
        {{ $slot }}
    </div>
</div>
