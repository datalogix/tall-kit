<section {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        @if($title || $subtitle)
            <header>
                @if($title)
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
                        {{ $title }}
                    </div>
                @endif

                @if($subtitle)
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'subtitle') }}>
                        {{ $subtitle }}
                    </div>
                @endif
            </header>
        @endif

        {{ $slot }}
    </div>

    @if(isset($actions))
        <footer {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}>
            {{ $actions }}
        </footer>
    @endif
</section>
