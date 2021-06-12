<section {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if(isset($header))
        <header {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}>
            {{ $header }}
        </header>
    @endif

    {{ $top ?? '' }}

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        {{ $slot }}
    </div>

    {{ $bottom ?? '' }}

    @if(isset($footer))
        <footer {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer') }}>
            {{ $footer }}
        </footer>
    @endif
</section>
