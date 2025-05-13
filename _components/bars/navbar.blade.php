<nav {{ $attrs() }}>
    {{ $prepend ?? '' }}

    <x-tallkit-logo
        :image="$logoImage"
        :name="$logoName"
        :url="$logoUrl"
        :route="$logoRoute"
        :attributes="$attrs('logo')"
        :props="$props('logo')"
        :theme="$theme"
    >
        {{ $logo ?? '' }}
    </x-tallkit-logo>

    <x-tallkit-button
        :attributes="$attrs('toggler')"
        :props="$props('toggler')"
        :theme="$theme"
    >
        {{ $toggler ?? '' }}
    </x-tallkit-button>

    <x-tallkit-nav
        :items="$items"
        :inline="$inline"
        :attributes="$attrs('nav')"
        :props="$props('nav')"
        :theme="$theme"
    >
        @isset ($navPrepend)
            <x-slot name="prepend">
                {{ $navPrepend }}
            </x-slot>
        @endisset

        @isset ($navAppend)
            <x-slot name="append">
                {{ $navAppend }}
            </x-slot>
        @endisset

        {{ $slot }}
    </x-tallkit-nav>

    {{ $append ?? '' }}
</nav>
