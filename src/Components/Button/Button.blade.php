<{{ $href ? 'a' : 'button' }} {{ $attr() }}>
    @if ($loading)<span {{ $attr('loading-container') }}>@endif
    <x-tallkit-icon :attributes="$attr('icon-left')">{{ $iconContent ?? '' }}</x-tallkit-icon>

    @if ($slot->isNotEmpty() || $text)
        <span {{ $attr('text') }}>
            {!! $slot->isEmpty() ? __($text) : $slot !!}
        </span>
    @endif

    <x-tallkit-icon :attributes="$attr('icon-right')" />
    @if ($loading)</span>@endif

    @if ($loading)
        <x-tallkit-loading
            :attributes="$attr('loading')"
            text="{!! is_string($loading) && ($slot->isNotEmpty() || $text) ? $loading : ($slot->isEmpty() ? __($text) : $slot) !!}"
        />
    @endif
</{{ $href ? 'a' : 'button' }}>
