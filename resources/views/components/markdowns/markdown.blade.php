<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    {!! $toHtml($slot) !!}
</div>
