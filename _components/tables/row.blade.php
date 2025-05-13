<tr {{ $attrs() }}>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</tr>
