<section {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        @if ($title || $subtitle)
            <header {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}>
                @if ($title)
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
                        {!! __($title) !!}
                    </div>
                @endif

                @if ($subtitle)
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'subtitle') }}>
                        {!! __($subtitle) !!}
                    </div>
                @endif
            </header>
        @endif

        {{ $slot }}
    </div>

    @isset ($actions)
        <footer {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}>
            {{ $actions }}
        </footer>
    @endisset
</section>
