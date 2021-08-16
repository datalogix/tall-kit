<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
>
    <x-label
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
        :label="$label"
        :theme="$theme"
    >
        {{ $labelContent ?? '' }}
    </x-label>

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'types', $type) }}>
        {{ $slot }}
    </div>
</x-field>
