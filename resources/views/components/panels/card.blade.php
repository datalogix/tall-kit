<section {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($href)
        <a
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'link') }}
            href="{{ $href }}"
            @if ($target) target="{{ $target }}" @endif
        >
    @endif

    @if ($imageHeader)
        <img
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'image-header') }}
            src="{{ asset($imageHeader) }}"
        />
    @endif

    @isset ($header)
        <header {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}>
            {{ $header }}
        </header>
    @endisset

    {{ $top ?? '' }}

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        @if ($title)
            <strong {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
                {!! __($title) !!}
            </strong>
        @endif

        @if ($slot->isEmpty())
            <p {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'text') }}>
                {!! __($text) !!}
            </p>
        @else
            {{ $slot }}
        @endif
    </div>

    {{ $bottom ?? '' }}

    @isset ($footer)
        <footer {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer') }}>
            {{ $footer }}
        </footer>
    @endisset

    @if ($imageFooter)
        <img
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'image-footer') }}
            src="{{ asset($imageFooter) }}"
        />
    @endif

    @if ($href)
        </a>
    @endif
</section>
