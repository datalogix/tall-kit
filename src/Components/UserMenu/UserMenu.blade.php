<x-tallkit-menu-dropdown :attributes="$attr()">
    <x-slot name="trigger">
        @isset ($trigger)
            {{ $trigger }}
        @elseif ($userName || $userAvatar || $avatarSearch || isset($avatar))
            <x-tallkit-user-button :attributes="$attr('trigger')">
                @isset ($avatar)
                    <x-slot name="avatar">
                        {{ $avatar }}
                    </x-slot>
                @endisset

                @isset ($avatarContent)
                    <x-slot name="avatarContent">
                        {{ $avatarContent }}
                    </x-slot>
                @endisset
            </x-tallkit-user-button>
        @endisset
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

    {{ $slot }}
</x-tallkit-menu-dropdown>
