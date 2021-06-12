<x-field
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <x-label
        :label="$label"
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'types', $type) }}>
        {{ $slot }}
    </div>
</x-field>
