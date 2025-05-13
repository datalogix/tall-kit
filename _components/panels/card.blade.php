<section {{ $attrs() }}>
    @if ($href)
        <a
            {{ $attrs('link') }}
            href="{{ $href }}"
            @if ($target) target="{{ $target }}" @endif
        >
    @endif

    @if ($imageHeader)
        <img
            {{ $attrs('image-header') }}
            src="{{ asset($imageHeader) }}"
        />
    @endif

    @isset ($header)
        <header {{ $attrs('header') }}>
            {{ $header }}
        </header>
    @endisset

    {{ $top ?? '' }}

    <div {{ $attrs('content') }}>
        @if ($title)
            <strong {{ $attrs('title') }}>
                {!! __($title) !!}
            </strong>
        @endif

        @if ($slot->isEmpty() && $text)
            <p {{ $attrs('text') }}>
                {!! __($text) !!}
            </p>
        @else
            {{ $slot }}
        @endif
    </div>

    {{ $bottom ?? '' }}

    @isset ($footer)
        <footer {{ $attrs('footer') }}>
            {{ $footer }}
        </footer>
    @endisset

    @if ($imageFooter)
        <img
            {{ $attrs('image-footer') }}
            src="{{ asset($imageFooter) }}"
        />
    @endif

    @if ($href)
        </a>
    @endif
</section>
