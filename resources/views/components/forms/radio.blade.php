<x-field
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        <input
            {{ $attributes->mergeThemeProvider($themeProvider, 'radio') }}
            type="radio"
            value="{{ $value }}"
            name="{{ $name }}"

            @if($isWired())
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @endif

            @if($checked)
                checked="checked"
            @endif
        />

        <x-label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}>
            {{ $slot->isEmpty() ? $label : $slot }}
        </x-label>
    </label>
</x-field>
