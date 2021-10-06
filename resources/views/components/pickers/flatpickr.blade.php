<x-input {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'flatpickr')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :id="$id"
    :label="$label"
    :type="'text'"
    :default="$slot->isEmpty() ? $default : $slot"
    :showErrors="$showErrors"
    :theme="$theme"
    :groupable="$groupable"
    :prependText="$prependText"
    :prependIcon="$prependIcon"
    :appendText="$appendText"
    :appendIcon="$appendIcon"
    :placeholder="$placeholder ?? $format"
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
