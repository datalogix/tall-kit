<div {{ $attr() }}>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</div>
