<span
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    data-icon="{{ $slot->isEmpty() ? $icon : $slot }}"
></span>
