@if ($items->isNotEmpty() || $slot->isNotEmpty() || (isset($header) && $header->isNotEmpty()) || (isset($footer) && $footer->isNotEmpty()))
    <x-sidebar
        {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
        :items="$items"
        :breakpoint="$breakpoint"
        :name="$name"
        :show="$show"
        :overlay="$overlay"
        :closeable="$closeable"
        :align="$align"
        :target="$target"
        :theme="$theme"
    >
        {{ $slot }}

        <x-slot name="header">
            <x-logo
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'logo') }}
                :image="$logoImage"
                :name="$logoName"
                :url="$logoUrl"
                :route="$logoRoute"
                :theme="$theme"
            >
                {{ $header ?? '' }}
            </x-logo>
        </x-slot>

        @isset ($footer)
            <x-slot name="footer">
                {{ $footer }}
            </x-slot>
        @endisset
    </x-sidebar>

    @isset ($trigger)
        {{ $trigger }}
    @elseif ($user)
        <x-user-button {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'trigger')
                ->merge(['x-init' => 'setup(\''.$name.'\')'])
            }}
            :user="$user"
            :guard="$guard"
            :user-name="$userName"
            :user-avatar="$userAvatar"
            :avatar-search="$avatarSearch"
            :avatar-provider="$avatarProvider"
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
@endif
