<x-form-button
    :method="$method"
    :action="$action"
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</x-form-button>
