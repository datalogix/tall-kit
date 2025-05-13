<div {{ $attrs() }}>
    @if ($relative)
        <div {{ $attrs('slider') }}>
    @endif

    <div {{ $attrs('track') }}>
        <ul {{ $attrs('list') }}>
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
