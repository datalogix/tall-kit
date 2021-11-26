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

    <x-input {{
        $attributes->mergeThemeProvider($themeProvider, 'filepond') }}
        :name="$name"
        :id="$id"
        :label="false"
        :type="'file'"
        :default="$slot->isEmpty() ? $default : $slot"
        :show-errors="$showErrors"
        :theme="$theme"
        :groupable="$groupable"
        :prepend-text="$prependText"
        :prepend-icon="$prependIcon"
        :append-text="$appendText"
        :append-icon="$appendIcon"
    >
        @isset ($prepend)
            <x-slot name="prepend">
                {{ $prepend }}
            </x-slot>
        @endisset

        @isset ($append)
            <x-slot name="append">
                {{ $append }}
            </x-slot>
        @endisset
    </x-input>
</x-field>
