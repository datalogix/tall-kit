<x-form
    :method="$method"
    :action="$action"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <x-submit {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}>
        {{ $slot->isEmpty() ? __($text) : $slot }}
    </x-submit>
</x-form>
