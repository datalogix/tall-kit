@if ($label || $slot->isNotEmpty())
    <span {{ $attrs() }}>
        {!! $slot->isEmpty() ? __($label) : $slot !!}
    </span>
@endif
