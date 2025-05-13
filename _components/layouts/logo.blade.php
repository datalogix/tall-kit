@if ($slot->isNotEmpty())
    {{ $slot }}
@elseif ($name || $image)
    <{{ $url ? 'a' : 'span' }} {{ $attrs() }}>
        @if ($image)
            <img {{ $attrs('image') }} />
        @else
            <span {{ $attrs('name') }}>
                {{ $name }}
            </span>
        @endif
    </{{ $url ? 'a' : 'span' }}>
@endif
