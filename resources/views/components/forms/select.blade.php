<x-field
    :name="$name"
    :label="$label"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <select
        {{ $attributes->mergeThemeProvider($themeProvider, $multiple ? 'multiselect' : 'select') }}
        name="{{ $name }}"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @endif

        @if($multiple)
            multiple
        @endif
    >
        @if($emptyOption && !$multiple)
            <option value="">{{ $emptyOption === true ? '---' : $emptyOption }}</option>
        @endif

        @forelse($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @empty
            {{ $slot }}
        @endforelse
    </select>
</x-field>
