<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :theme="$theme"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
    :display="false"
>
    <x-display
        {{ $attributes->mergeThemeProvider($themeProvider, 'display') }}
        :value="$value"
        :bind="$bind"
        :name="$name"
        :default="$default"
        :theme="$theme"
    >
        {{ $slot }}
    </x-display>

    @isset ($prepend)
        <x-slot name="prepend">
            {{ $prepend }}
        </x-slot>
    @endisset

    @isset ($append)
        <x-slot name="append">
            {{ $append }}
        </x-slot>
    @endisset
</x-field>
