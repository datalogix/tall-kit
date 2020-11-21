@if($label || $slot->isNotEmpty())
    <span {{ $attributes->merge($themeProvider->container->toArray()) }}>
        {{ $slot->isEmpty() ? $label : $slot }}
    </span>
@endif
