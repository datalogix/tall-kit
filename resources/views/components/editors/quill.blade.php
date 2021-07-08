<x-field {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        <x-label
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
            :label="$label"
            :theme="$theme"
        >{{ $labelContent ?? '' }}</x-label>
    </label>

    <x-input
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
        :theme="$theme"
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'quill') }}></div>
</x-field>
