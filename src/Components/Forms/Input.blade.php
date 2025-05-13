<x-tallkit-field :attributes="$attr('root', false)">
    <input {{ $attr('input', true) }} />

    @isset ($before)
        <x-slot name="before">
            {{ $before }}
        </x-slot>
    @endisset

    @isset ($after)
        <x-slot name="after">
            {{ $after }}
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
