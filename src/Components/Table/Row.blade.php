<tr {{ $attr() }}>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</tr>
