<x-field {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    @if ($label || isset($labelContent))
        <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
            <x-label
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
                :label="$label"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-label>
        </label>
    @endif

    <x-textarea
        {{ $attributes->mergeThemeProvider($themeProvider, 'easymde') }}
        :name="$name"
        :id="$id"
        :label="false"
        :default="$slot->isEmpty() ? $default : $slot"
        :show-errors="$showErrors"
        :theme="$theme"
        :groupable="false"
    />
</x-field>
