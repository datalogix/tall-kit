<td {{ $attrs() }}>
    <div {{ $attrs('content') }}>
        {!! $slot->isEmpty() ? __($text) : $slot !!}
    </div>
</td>
