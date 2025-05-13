<x-tallkit-field
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :title="$value"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <x-tallkit-input
        type="hidden"
        :name="$name"
        :id="$id"
        :modifier="$modifier"
        :default="$slot->isEmpty() ? $default : $slot"
        :attributes="$attrs('input')"
        :props="$props('input')"
        :theme="$theme"
    />

    <div {{ $attrs('pickr') }}></div>
</x-tallkit-field>
