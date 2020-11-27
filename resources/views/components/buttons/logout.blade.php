<x-form-button :method="$method" :action="$action" {{ $attributes->merge(toArray($themeProvider->button)) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</x-form-button>
