@if($label || $slot->isNotEmpty())
    <span {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
        {{ $slot->isEmpty() ? $label : $slot }}
    </span>
@endif
