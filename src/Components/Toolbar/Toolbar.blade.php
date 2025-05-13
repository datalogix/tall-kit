<header {{ $attr() }}>
    @if(isset($left) || $title)
        <div {{ $attr('left') }}>
            {{ $left ?? '' }}

            @if ($title)
                <h1 {{ $attr('title') }}>
                    {!! __($title) !!}
                </h1>
            @endif
        </div>
    @endisset

    {{ $slot }}

    @isset($right)
        <div {{ $attr('right') }}>
            {{ $right ?? '' }}
        </div>
    @endif
</header>
