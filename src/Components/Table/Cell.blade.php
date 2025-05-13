<td {{ $attr() }}>
    <div {{ $attr('content') }}>
        {!! $slot->isEmpty() ? __($text) : $slot !!}
    </div>
</td>
