<section {{ $attr() }}>
    <div {{ $attr('content') }}>
        @if ($title || $subtitle)
            <header {{ $attr('header') }}>
                @if ($title)
                    <div {{ $attr('title') }}>
                        {!! __($title) !!}
                    </div>
                @endif

                @if ($subtitle)
                    <div {{ $attr('subtitle') }}>
                        {!! __($subtitle) !!}
                    </div>
                @endif
            </header>
        @endif

        {{ $slot }}
    </div>

    @isset ($actions)
        <footer {{ $attr('actions') }}>
            {{ $actions }}
        </footer>
    @endisset
</section>
