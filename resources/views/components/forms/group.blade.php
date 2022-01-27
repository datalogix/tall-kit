<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    <x-label
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
        :label="$label"
        :theme="$theme"
    >
        {{ $labelContent ?? '' }}
    </x-label>

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'types', $getType()) }}>
        {{ $slot }}
    </div>
</x-field>
