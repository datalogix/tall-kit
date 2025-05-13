<x-tallkit-field
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
    :display="false"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <x-tallkit-display
        :value="$value"
        :bind="$bind"
        :name="$name"
        :default="$default"
        :attributes="$attrs('display')"
        :props="$props('display')"
        :theme="$theme"
    >
        {{ $slot }}
    </x-tallkit-display>

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
</x-tallkit-field>
