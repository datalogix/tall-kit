<x-tallkit-checkbox :attributes="$attr()">
    {{ $slot }}

    <x-slot name="custom">
        <div {{ $attr('switch') }}></div>
    </x-slot>

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
</x-tallkit-checkbox>
