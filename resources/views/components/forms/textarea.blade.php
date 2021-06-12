<x-field
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <textarea
        {{ $attributes->mergeThemeProvider($themeProvider, 'textarea') }}
        name="{{ $name }}"

        @if($id)
            id="{{ $id }}"
        @endif

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @endif
    >@unless($isWired()){{ $value ?? $slot }}@endunless</textarea>
</x-field>
