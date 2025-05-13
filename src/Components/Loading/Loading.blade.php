<div {{ $attr() }}>
    <x-tallkit-icon :attributes="$attr('icon')" />

    @if ($slot->isNotEmpty() || $text)
        <span {{ $attr('text') }}>
            {!! $slot->isEmpty() ? __($text) : $slot !!}
        </span>
    @endif
</div>
