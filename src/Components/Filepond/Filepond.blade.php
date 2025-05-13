<x-tallkit-field :attributes="$attr()">
    <x-tallkit-loading :attributes="$attr('loading')" />

    <input {{ $attr('filepond') }} />

    @isset ($labelContent)
        <x-slot name="labelContent">
            {{ $labelContent }}
        </x-slot>
    @endisset

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
