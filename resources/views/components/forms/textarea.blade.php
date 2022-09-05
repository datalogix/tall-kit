<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :theme="$theme"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
>
    <textarea
        {{ $attributes->mergeThemeProvider($themeProvider, 'textarea') }}

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
        @endif
    >@unless($isWired()){{ $value ?? $slot }}@endunless</textarea>

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
