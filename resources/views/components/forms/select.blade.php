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
    <select
        {{ $attributes->mergeThemeProvider($themeProvider, $multiple ? 'multiselect' : 'select') }}

        @if ($name)
            name="{{ $name }}"
        @endif

        @if ($isWired() && $name)
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @endif

        @if ($multiple)
            multiple
        @endif
    >
        @if ($emptyOption && !$multiple)
            <option value="">{{ $emptyOption === true ? '---' : $emptyOption }}</option>
        @endif

        @forelse ($options as $key => $option)
            <option value="{{ $key }}" @if ($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @empty
            {{ $slot }}
        @endforelse
    </select>

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
