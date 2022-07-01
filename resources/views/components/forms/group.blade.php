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

    <{{ $fieldset ? 'fieldset' : 'div' }} {{
        $attributes
            ->mergeThemeProvider($themeProvider, $fieldset ? 'fieldset' : null)
            ->mergeOnlyThemeProvider($themeProvider, 'types', $getType())
    }}>
        {{ $slot }}
    </{{ $fieldset ? 'fieldset' : 'div' }}>
</x-field>
