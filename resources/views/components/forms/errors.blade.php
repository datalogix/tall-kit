@error($name, $bag)
    <div {{ $attributes->merge(toArray($themeProvider->container)) }}>
        {{ $slot->isEmpty() ? $message : $slot }}
    </div>
@enderror
