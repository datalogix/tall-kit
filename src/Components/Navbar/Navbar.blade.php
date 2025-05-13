<nav {{ $attr() }}>
    {{ $before ?? '' }}

    <x-tallkit-logo :attributes="$attr('logo')">
        {{ $logo ?? '' }}
    </x-tallkit-logo>

    <x-tallkit-button :attributes="$attr('toggler')">
        {{ $toggler ?? '' }}
    </x-tallkit-button>

    <x-tallkit-nav :attributes="$attr('nav')">
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

    {{ $after ?? '' }}
</nav>
