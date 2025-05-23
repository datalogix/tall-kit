<x-tallkit-field
    :name="$name"
    :label="$label"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
    :groupable="$groupable"
    :prepend-text="$prependText"
    :prepend-icon="$prependIcon"
    :append-text="$appendText"
    :append-icon="$appendIcon"
>
    <select
        {{ $attrs($multiple ? 'multiselect' : 'select')->merge($choicesOptions()) }}

        @if ($name)
            name="{{ $name }}"
        @endif

        @if ($isModel() && $name)
            x-model{!! $modelModifier($modifier) !!}="{{ $modelName($name) }}"
        @endif

        @if ($isWired() && $name)
            wire:model{!! $wireModifier($modifier) !!}="{{ $name }}"
        @endif

        @if ($multiple)
            multiple
        @endif
    >
        @if ($emptyOption && ! $multiple)
            <option
                value=""
                @if ($isSelected()) selected="selected" @endif
                @if ($isWired() && $name) wire:key="{{ $name }}-empty-option" @endif
            >
                {{ $emptyOption === true ? '---' : __($emptyOption) }}
            </option>
        @endif

        @forelse ($options as $key => $option)
            @if (is_iterable($option))
                <optgroup label="{{ $key }}">
                    @foreach ($option as $subkey => $suboption)
                        <option
                            value="{{ $subkey }}"
                            @if ($isSelected($subkey)) selected="selected" @endif
                            @if ($isWired() && $name) wire:key="{{ $name }}-{{ $subkey }}" @endif
                        >
                            {{ $suboption }}
                        </option>
                    @endforeach
                </optgroup>
            @else
                <option
                    value="{{ $key }}"
                    @if ($isSelected($key)) selected="selected" @endif
                    @if ($isWired() && $name) wire:key="{{ $name }}-{{ $key }}" @endif
                >
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
</x-tallkit-field>
