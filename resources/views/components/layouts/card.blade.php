<section {{ $attributes->merge(toArray($themeProvider->container)) }}>
    @if(isset($header))
        <header {{ $themeProvider->header }}>
            {{ $header }}
        </header>
    @endif

    {{ $top ?? '' }}

    <div {{ $themeProvider->content }}>
        {{ $slot }}
    </div>

    @if(isset($footer))
        <footer {{ $themeProvider->footer }}>
            {{ $footer }}
        </footer>
    @endif
</section>
