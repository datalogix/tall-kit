<x-form :method="$method" :action="$action" :class="$themeProvider->container">
    <x-submit {{ $attributes->merge($themeProvider->button->toArray()) }}>
        {{ $slot->isEmpty() ? __($text) : $slot }}
    </x-submit>
</x-form>
