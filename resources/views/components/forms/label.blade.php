@if($label || $slot->isNotEmpty())
    <span {{ $attributes->merge(toArray($themeProvider->container)) }}>
        {{ $slot->isEmpty() ? $label : $slot }}
    </span>
@endif
