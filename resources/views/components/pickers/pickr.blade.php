<x-field {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :theme="$theme"
    :title="$value"
>
    <x-input
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
        :name="$name"
        :id="$id"
        :type="'hidden'"
        :default="$slot->isEmpty() ? $default : $slot"
        :theme="$theme"
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'pickr') }}></div>
</x-field>
