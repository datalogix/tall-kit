<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
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

            @if ($isWired() && $name)
                wire:model{!! $wireModifier() !!}="{{ $name }}"
            @endif

            @if ($checked)
                checked="checked"
            @endif
        />

        <x-label
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
            :theme="$theme"
        >
            {!! $slot->isEmpty() ? $label : $slot !!}
        </x-label>
    </label>
</x-field>
