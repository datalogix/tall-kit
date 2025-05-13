<x-tallkit-menu-dropdown
    :inline="$inline"
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :align="$align"
    :items="$items"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <x-slot name="trigger">
        @isset ($trigger)
            {{ $trigger }}
        @elseif ($userName || $userAvatar || $avatarSearch || isset($avatar))
            <x-tallkit-user-button
                :user="$user"
                :guard="$guard"
                :user-name="$userName"
                :user-avatar="$userAvatar"
                :avatar-search="$avatarSearch"
                :avatar-provider="$avatarProvider"
                :avatar-fallback="$avatarFallback"
                :avatar-icon="$avatarIcon"
                :attributes="$attrs('trigger')"
                :props="$props('trigger')"
                :theme="$theme"
            >
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
