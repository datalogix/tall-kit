<header {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if(isset($left) || $title)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'left') }}>
            {{ $left ?? '' }}

            @if ($title)
                <h1 {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
                    {!! __($title) !!}
                </h1>
            @endif
        </div>
    @endisset

    {{ $slot }}

    @isset($right)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'right') }}>
            {{ $right ?? '' }}
        </div>
    @endif
</header>
