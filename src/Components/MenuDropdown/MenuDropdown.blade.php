<div {{ $attr() }}>
    <x-tallkit-dropdown :attributes="$attr('dropdown')">
        <x-slot name="trigger">
            @isset ($trigger)
                {{ $trigger }}
            @else
                <x-tallkit-button :attributes="$attr('trigger')" />
            @endisset
        </x-slot>

        <x-tallkit-menu :attributes="$attr('menu')">
            {{ $slot }}

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
        </x-tallkit-menu>
    </x-tallkit-dropdown>
</div>
