@if ($items->isNotEmpty() || $slot->isNotEmpty() || (isset($header) && $header->isNotEmpty()) || (isset($footer) && $footer->isNotEmpty()))
    <x-tallkit-sidebar
        :items="$items"
        :breakpoint="$breakpoint"
        :name="$name"
        :show="$show"
        :overlay="$overlay"
        :closeable="$closeable"
        :align="$align"
        :target="$target"
        :attributes="$attrs()"
        :props="$props()"
        :theme="$theme"
    >
        {{ $slot }}

        <x-slot name="header">
            <x-tallkit-logo
                :image="$logoImage"
                :name="$logoName"
                :url="$logoUrl"
                :route="$logoRoute"
                :attributes="$attrs('logo')"
                :props="$props('logo')"
                :theme="$theme"
            >
                {{ $header ?? '' }}
            </x-tallkit-logo>
        </x-slot>

        @isset ($footer)
            <x-slot name="footer">
                {{ $footer }}
            </x-slot>
        @endisset
    </x-tallkit-sidebar>

    @isset ($trigger)
        {{ $trigger }}
    @elseif ($user)
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
@endif
