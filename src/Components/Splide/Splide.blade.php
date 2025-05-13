<div {{ $attr() }}>
    @if ($relative)
        <div {{ $attr('slider') }}>
    @endif

    <div {{ $attr('track') }}>
        <ul {{ $attr('list') }}>
            {{ $slot }}
        </ul>
    </div>

    @if ($relative)
        </div>
    @endif

    @isset ($extra)
        {{ $extra }}
    @endisset
</div>
