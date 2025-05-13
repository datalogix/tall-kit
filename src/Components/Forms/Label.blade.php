@if ($label || $slot->isNotEmpty())
    <span {{ $attr() }}>
        {!! $slot->isEmpty() ? __($label) : $slot !!}
    </span>
@endif
