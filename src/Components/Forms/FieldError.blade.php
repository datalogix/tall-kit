@error($name, $bag)
    <div {{ $attr() }}>
        {!! $slot->isEmpty() ? $message : $slot !!}
    </div>
@enderror
