<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
}}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'wrapper') }}>
        {{ $slot }}
    </div>

    @isset($pagination)
        {{ $pagination }}
    @elseif(data_get($options, 'pagination'))
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'pagination') }}></div>
    @endif

    @isset($navigation)
        {{ $navigation }}
    @elseif(data_get($options, 'navigation'))
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'button-prev') }}></div>
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'button-next') }}></div>
    @endif

    @isset($scrollbar)
        {{ $scrollbar }}
    @elseif(data_get($options, 'scrollbar'))
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'scrollbar') }}></div>
    @endif
</div>
