<x-tallkit-field :attributes="$attr()">
    <label {{ $attr('label-container') }}>
        @if ($value === 1 && $isNotWired() && !Str::endsWith($name, '[]'))
            <input type="hidden" value="0" name="{{ $name }}" />
        @endif

        <input {{ $attr('checkbox') }} />

        {{ $custom ?? '' }}

        <x-tallkit-label :attributes="$attr('label')">
            {{ $slot }}
        </x-tallkit-label>
    </label>

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
