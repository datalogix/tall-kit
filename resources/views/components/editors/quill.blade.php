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
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
                :label="$label"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-label>
        </label>
    @endif

    <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />

    <x-input
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
        :name="$name"
        :id="$id"
        :type="'hidden'"
        :default="$slot->isEmpty() ? $default : $slot"
        :theme="$theme"
    />

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'quill') }}></div>
</x-field>
