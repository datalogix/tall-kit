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
        >
            {{ $labelContent ?? '' }}
        </x-label>
    </label>

    <x-textarea
        {{ $attributes->mergeThemeProvider($themeProvider, 'easymde') }}
        :name="$name"
        :id="$id"
        :label="false"
        :default="$slot->isEmpty() ? $default : $slot"
        :showErrors="$showErrors"
        :groupable="false"
        :theme="$theme"
    />
</x-field>
