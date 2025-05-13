<x-tallkit-field :attributes="$attr('root', false)">
    <select {{ $attr('select', true) }}>
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
