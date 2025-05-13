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
        :type="'hidden'"
        :modifier="$modifier"
        :default="$slot->isEmpty() ? $default : $slot"
        :attributes="$attrs('input')"
        :props="$props('input')"
        :theme="$theme"
    />

    <trix-editor
        {{ $attrs('editor') }}
        input="{{ $id }}"
    ></trix-editor>
</x-tallkit-field>
