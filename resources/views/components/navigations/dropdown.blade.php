<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}>
        {{ $trigger }}
    </div>

    @if($overlay)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'overlay') }}>
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'backdrop') }}></div>
        </div>
    @endif

    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'dropdown')
            ->mergeThemeProvider($themeProvider, 'aligns', $align)
    }}>
        {{ $slot }}
    </div>
</div>
