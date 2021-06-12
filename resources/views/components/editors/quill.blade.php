<x-field
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :theme="$theme"
    x-init="init({{ $jsonOptions() }})"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <x-input
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'quill') }}></div>
</x-field>
