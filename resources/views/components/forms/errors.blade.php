@error($name, $bag)
    <div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
        {!! $slot->isEmpty() ? $message : $slot !!}
    </div>
@enderror
