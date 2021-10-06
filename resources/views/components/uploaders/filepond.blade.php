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

    <x-input {{
        $attributes->mergeThemeProvider($themeProvider, 'filepond') }}
        :name="$name"
        :id="$id"
        :label="false"
        :type="'file'"
        :default="$slot->isEmpty() ? $default : $slot"
        :showErrors="$showErrors"
        :theme="$theme"
        :groupable="$groupable"
        :prependText="$prependText"
        :prependIcon="$prependIcon"
        :appendText="$appendText"
        :appendIcon="$appendIcon"
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
