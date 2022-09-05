<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        <input
            {{ $attributes->mergeThemeProvider($themeProvider, 'radio') }}
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

        <x-label
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
            :label="$label"
            :theme="$theme"
        >
            {{ $slot }}
        </x-label>
    </label>
</x-field>
