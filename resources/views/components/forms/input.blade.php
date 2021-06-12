<x-field
    :name="$name"
    :label="$type === 'hidden' ? false : $label"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, $type === 'hidden' ? 'hidden' : 'container') }}
>
    <input
        {{ $attributes->mergeThemeProvider($themeProvider, 'input')->merge($maskOptions()) }}
        type="{{ $type }}"
        name="{{ $name }}"

        @if($id)
            id="{{ $id }}"
        @endif

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @else
            value="{{ $value ?? $slot }}"
        @endif
    />
</x-field>
