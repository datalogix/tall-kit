@error($name, $bag)
    <div {{ $attrs() }}>
        {!! $slot->isEmpty() ? $message : $slot !!}
    </div>
@enderror
