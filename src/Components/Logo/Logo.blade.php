@if ($slot->isNotEmpty())
    {{ $slot }}
@elseif ($name || $image)
    <{{ $url ? 'a' : 'span' }} {{ $attr() }}>
        @if ($image)
            <img {{ $attr('image') }} />
        @else
            <span {{ $attr('name') }}>
                {{ $name }}
            </span>
        @endif
    </{{ $url ? 'a' : 'span' }}>
@endif
