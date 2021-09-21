<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :groupable="$groupable"
    :prependText="$prependText"
    :prependIcon="$prependIcon"
    :appendText="$appendText"
    :appendIcon="$appendIcon"
    :theme="$theme"
>
    <textarea
        {{ $attributes->mergeThemeProvider($themeProvider, 'textarea') }}

        @if ($name)
            name="{{ $name }}"
        @endif

        @if ($id)
            id="{{ $id }}"
        @endif

        @if ($isWired() && $name)
            wire:model{!! $wireModifier() !!}="{{ $name }}"
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
