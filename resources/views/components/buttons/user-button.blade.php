<x-button color="none" {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($userAvatar || $avatarSearch || isset($avatar))
        <x-slot name="icon">
            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}>
                @isset ($avatar)
                    {{ $avatar }}
                @else
                    <x-avatar
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'avatar') }}
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
        </x-slot>
    @endif

    {{ $slot->isEmpty() ? $userName : $slot }}
</x-button>
