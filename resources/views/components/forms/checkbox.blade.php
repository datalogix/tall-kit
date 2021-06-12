<x-field
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        @if ($value === 1 && $isNotWired())
            <input type="hidden" value="0" name="{{ $name }}" />
        @endif

        <input
            {{ $attributes->mergeThemeProvider($themeProvider, 'checkbox') }}
            type="checkbox"
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
