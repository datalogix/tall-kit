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
            @if (is_iterable($option))
                <optgroup label="{{ $key }}">
                    @foreach ($option as $subkey => $suboption)
                        <option value="{{ $subkey }}" @if ($isSelected($subkey)) selected="selected" @endif>
                            {{ $suboption }}
                        </option>
                    @endforeach
                </optgroup>
            @else
                <option value="{{ $key }}" @if ($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @endif
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
