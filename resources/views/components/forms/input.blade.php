<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, $type === 'hidden' ? 'hidden' : 'container') }}
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :theme="$theme"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
    :display="$display"
>
    <input {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'input')
            ->merge($maskOptions())
            ->merge($cleaveOptions())
            ->merge($tagifyOptions())
        }}

        type="{{ $type }}"

        @if ($name)
            name="{{ $name }}"
        @endif

        @if ($id)
            id="{{ $id }}"
        @endif

        @if ($isWired() && $name)
            wire:model{!! $wireModifier() !!}="{{ $name }}"
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
