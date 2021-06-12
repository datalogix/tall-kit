<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    @if(isset($logo))
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'logo') }}>
            {{ $logo }}
        </div>
    @endif

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'card') }}>
        {{ $slot }}
    </div>
</div>
