<div {{ $attrs() }}>
    <x-tallkit-dropdown
        :name="$name"
        :show="$show"
        :overlay="$overlay"
        :closeable="$closeable"
        :align="$align"
        :attributes="$attrs('dropdown')"
        :props="$props('dropdown')"
        :theme="$theme"
        :theme:container="$container()"
    >
        <x-slot name="trigger">
            @isset ($trigger)
                {{ $trigger }}
            @else
                <x-tallkit-button
                    preset="trigger"
                    :tooltip="$tooltip"
                    :attributes="$attrs('trigger')"
                    :props="$props('trigger')"
                    :theme="$theme"
                />
            @endisset
        </x-slot>

        <x-tallkit-menu
            :items="$items"
            :inline="$inline"
            :attributes="$attrs('menu')"
            :props="$props('menu')"
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
        </x-tallkit-menu>
    </x-tallkit-dropdown>
</div>
