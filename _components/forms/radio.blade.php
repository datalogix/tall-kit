<x-tallkit-field
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <label {{ $attrs('label') }}>
        <input
            {{ $attrs('radio') }}

            type="radio"
            value="{{ $value }}"

            @if ($name)
                name="{{ $name }}"
            @endif

            @if ($isModel() && $name)
                x-model{!! $modelModifier($modifier) !!}="{{ $modelName($name) }}"
            @endif

            @if ($isWired() && $name)
                wire:model{!! $wireModifier($modifier) !!}="{{ $name }}"
            @endif

            @if ($checked)
                checked="checked"
            @endif
        />

        <x-tallkit-label
            :label="$label"
            :attributes="$attrs('label-text')"
            :props="$props('label-text')"
            :theme="$theme"
        >
            {{ $slot }}
        </x-tallkit-label>
    </label>
</x-tallkit-field>
