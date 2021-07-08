<x-input {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'flatpickr')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    :name="$name"
    :id="$id"
    :label="$label"
    :type="'text'"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    :placeholder="$placeholder ?? $format"
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
