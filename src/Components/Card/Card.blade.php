<section {{ $attr() }}>
    @if ($href)
        <a {{ $attr('link') }}>
    @endif

    @if ($imageHeader)
        <img {{ $attr('image-header') }} />
    @endif

    @isset ($header)
        <header {{ $attr('header') }}>
            {{ $header }}
        </header>
    @endisset

    {{ $top ?? '' }}

    <div {{ $attr('content') }}>
        @if ($title)
            <strong {{ $attr('title') }}>
                {!! __($title) !!}
            </strong>
        @endif

        @if ($slot->isEmpty() && $text)
            <p {{ $attr('text') }}>
                {!! __($text) !!}
            </p>
        @else
            {{ $slot }}
        @endif
    </div>

    {{ $bottom ?? '' }}

    @isset ($footer)
        <footer {{ $attr('footer') }}>
            {{ $footer }}
        </footer>
    @endisset

    @if ($imageFooter)
        <img {{ $attr('image-footer') }} />
    @endif

    @if ($href)
        </a>
    @endif
</section>
