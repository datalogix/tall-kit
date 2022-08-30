<span
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    data-icon="{{ $slot->isEmpty() ? $name : $slot }}"
></span>
