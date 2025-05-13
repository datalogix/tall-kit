<x-tallkit-textarea :attributes="$attr()">
    {{ $slot }}

    <x-slot name="before">
        <x-tallkit-loading :attributes="$attr('loading')" />
    </x-slot>

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
</x-tallkit-textarea>
