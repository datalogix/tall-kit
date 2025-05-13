<x-tallkit-field
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    @if ($label || isset($labelContent))
        <label {{ $attrs('label') }}>
            <x-tallkit-label
                :label="$label"
                :attributes="$attrs('label-text')"
                :props="$props('label-text')"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-tallkit-label>
        </label>
    @endif

    <x-tallkit-loading
        :attributes="$attrs('loading')"
        :props="$props('loading')"
        :theme="$theme"
    />

    <x-tallkit-input
        :name="$name"
        :id="$id"
        :label="false"
        :type="'file'"
        :default="$slot->isEmpty() ? $default : $slot"
        :show-errors="$showErrors"
        :groupable="$groupable"
        :prepend-text="$prependText"
        :prepend-icon="$prependIcon"
        :append-text="$appendText"
        :append-icon="$appendIcon"
        :attributes="$attrs('filepond')"
        :props="$props('filepond')"
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
</x-tallkit-field>
