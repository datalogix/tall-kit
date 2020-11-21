@error($name, $bag)
    <div {{ $attributes->merge($themeProvider->container->toArray()) }}>
        {{ $slot->isEmpty() ? $message : $slot }}
    </div>
@enderror
