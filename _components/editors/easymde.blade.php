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

    <x-tallkit-textarea
        :name="$name"
        :id="$id"
        :label="false"
        :modifier="$modifier"
        :default="$slot->isEmpty() ? $default : $slot"
        :show-errors="$showErrors"
        :groupable="false"
        :attributes="$attrs('editor')"
        :props="$props('editor')"
        :theme="$theme"
    />
</x-tallkit-field>
