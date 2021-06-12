<x-field
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <x-input
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
    />

    <trix-editor
        input="{{ $id }}"
        {{ $attributes->mergeThemeProvider($themeProvider, 'trix') }}
    ></trix-editor>
</x-field>
