<section {{ $attrs() }}>
    <div {{ $attrs('content') }}>
        @if ($title || $subtitle)
            <header {{ $attrs('header') }}>
                @if ($title)
                    <div {{ $attrs('title') }}>
                        {!! __($title) !!}
                    </div>
                @endif

                @if ($subtitle)
                    <div {{ $attrs('subtitle') }}>
                        {!! __($subtitle) !!}
                    </div>
                @endif
            </header>
        @endif

        {{ $slot }}
    </div>

    @isset ($actions)
        <footer {{ $attrs('actions') }}>
            {{ $actions }}
        </footer>
    @endisset
</section>
