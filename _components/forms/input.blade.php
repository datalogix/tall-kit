<x-tallkit-field
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
    :display="$display"
    :attributes="$attrs($type === 'hidden' ? 'hidden' : 'container')"
    :props="$props()"
    :theme="$theme"
>
    <input {{
        $attrs('input', false)
            ->merge($maskOptions())
            ->merge($cleaveOptions())
            ->merge($choicesOptions())
            ->merge($tagifyOptions())
        }}

        type="{{ $type }}"

        @if ($name)
            name="{{ $name }}"
        @endif

        @if ($id)
            id="{{ $id }}"
        @endif

        @if ($isModel() && $name)
            x-model{!! $modelModifier($modifier) !!}="{{ $modelName($name) }}"
        @endif

        @if ($isWired() && $name)
            wire:model{!! $wireModifier($modifier) !!}="{{ $name }}"
        @else
            value="{{ $value ?? $slot }}"
        @endif
    />

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
</x-field>
