<x-field {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :title="$value"
    :theme="$theme"
>
    <x-input
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
        :theme="$theme"
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'pickr') }}></div>
</x-field>
