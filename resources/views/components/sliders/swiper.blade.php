<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'wrapper') }}>
        {{ $slot }}
    </div>

    @isset($pagination)
        {{ $pagination }}
    @elseif($options['pagination'] ?? null)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'pagination') }}></div>
    @endif

    @isset($navigation)
        {{ $navigation }}
    @elseif($options['navigation'] ?? null)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'button-prev') }}></div>
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'button-next') }}></div>
    @endif

    @isset($scrollbar)
        {{ $scrollbar }}
    @elseif($options['scrollbar'] ?? null)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'scrollbar') }}></div>
    @endif
</div>
