<x-form :method="$method" :action="$action" :class="$themeProvider->container">
    <x-submit {{ $attributes->merge(toArray($themeProvider->button)) }}>
        {{ $slot->isEmpty() ? __($text) : $slot }}
    </x-submit>
</x-form>
