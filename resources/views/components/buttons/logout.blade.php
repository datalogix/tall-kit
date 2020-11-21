<x-form-button :method="$method" :action="$action" {{ $attributes->merge($themeProvider->button->toArray()) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</x-form-button>
