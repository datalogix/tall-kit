<x-menu-dropdown
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    :inline="$inline"
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :align="$align"
    :items="$items"
    :theme="$theme"
>
    <x-slot name="trigger">
        @isset ($trigger)
            {{ $trigger }}
        @elseif ($userName || $userAvatar || $avatarSearch || isset($avatar))
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'user') }}>
                @if ($userAvatar || $avatarSearch || isset($avatar))
                    <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'userAvatar') }}>
                        @isset ($avatar)
                            {{ $avatar }}
                        @else
                            <x-avatar
                                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'userAvatarContainer') }}
                                :src="$userAvatar"
                                :search="$avatarSearch"
                                :provider="$avatarProvider"
                                :fallback="$avatarFallback"
                                :icon="$avatarIcon"
                                :theme="$theme"
                            >
                                {{ $avatarContent ?? '' }}
                            </x-avatar>
                        @endisset
                    </span>
                @endif

                @if ($userName)
                    <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'userName') }}>
                        {{ $userName }}
                    </span>
                @endif
            </div>
        @endisset
    </x-slot>

    {{ $slot }}
</x-menu-dropdown>
