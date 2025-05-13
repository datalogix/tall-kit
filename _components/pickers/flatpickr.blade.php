<x-tallkit-input
    type="text"
    :name="$name"
    :id="$id"
    :label="$label"
    :modifier="$modifier"
    :default="$slot->isEmpty() ? $default : $slot"
    :show-errors="$showErrors"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
    :placeholder="$placeholder ?? $format"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
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
</x-tallkit-input>
