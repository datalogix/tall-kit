<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
>
    @if ($relative)<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'slider') }}>@endif
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'track') }}>
        <ul {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'list') }}>
            {{ $slot }}
        </ul>
    </div>
    @if ($relative)</div>@endif

    @isset($extra)
        {{ $extra }}
    @endisset
</div>
