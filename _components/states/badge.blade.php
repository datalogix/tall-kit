<div {{ $attrs() }}>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</div>
