<x-menu-dropdown
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    :inline="$inline"
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :align="$align"
    :items="$items"
    :theme="$theme"
>
    <x-slot name="trigger">
        @isset ($trigger)
            {{ $trigger }}
        @elseif ($userName || $userAvatar || $avatarSearch || isset($avatar))
            <x-user-button
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}
                :user="$user"
                :guard="$guard"
                :user-name="$userName"
                :user-avatar="$userAvatar"
                :avatar-search="$avatarSearch"
                :avatar-orovider="$avatarProvider"
                :avatar-fallback="$avatarFallback"
                :avatar-icon="$avatarIcon"
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
            </x-user-button>
        @endisset
    </x-slot>

    {{ $slot }}
</x-menu-dropdown>
