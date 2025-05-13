<x-tallkit-nav
    :items="$items"
    :inline="$inline"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
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

    {{ $slot }}
</x-tallkit-nav>
