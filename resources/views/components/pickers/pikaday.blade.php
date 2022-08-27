<x-input {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'pikaday')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
    type="text"
    :name="$name"
    :id="$id"
    :label="$label"
    :modifier="$modifier"
    :default="$slot->isEmpty() ? $default : $slot"
    :show-errors="$showErrors"
    :theme="$theme"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
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
