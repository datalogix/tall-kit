<x-field {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :theme="$theme"
    :title="$value"
>
    <x-input
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
        type="hidden"
        :name="$name"
        :id="$id"
        :modifier="$modifier"
        :default="$slot->isEmpty() ? $default : $slot"
        :theme="$theme"
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'pickr') }}></div>
</x-field>
