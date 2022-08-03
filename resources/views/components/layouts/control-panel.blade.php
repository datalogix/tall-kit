@if (is_array($html))
    <x-html
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'html', 'attrs') }}
        :options="$html"
        :theme="$theme"
    >
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset
@endif
<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <x-user-sidebar
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'sidebar') }}
        :items="$sidebarItems"
        :breakpoint="$sidebarBreakpoint"
        :name="$sidebarName"
        :show="$sidebarShow"
        :overlay="$sidebarOverlay"
        :closeable="$sidebarCloseable"
        :align="$sidebarAlign"
        :align="$sidebarTarget"
        :logo-image="$logoImage"
        :logo-name="$logoName"
        :logo-url="$logoUrl"
        :user="$user"
        :guard="$guard"
        :theme="$theme"
    >
        {{ $sidebar ?? '' }}

        @isset ($sidebarHeader)
            <x-slot name="header">
                {{ $sidebarHeader }}
            </x-slot>
        @endisset

        @isset ($sidebarFooter)
            <x-slot name="footer">
                {{ $sidebarFooter }}
            </x-slot>
        @endisset

        <x-slot name="trigger"></x-slot>
    </x-user-sidebar>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'box') }}>
        <x-toolbar
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'toolbar') }}
            :title="$title"
            :theme="$theme"
        >
            {{ $toolbar ?? '' }}

            <x-slot name="left">
                @isset ($toolbarLeft)
                    {{ $toolbarLeft }}
                @else
                    <x-button
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'toggler') }}
                        preset="toggler"
                        :click="'$dispatch(\''.$sidebarName.'-toggle\')'"
                        :theme="$theme"
                    >
                        {{ $toggler ?? '' }}
                    </x-button>
                @endisset
            </x-slot>

            <x-slot name="right">
                @isset ($toolbarRight)
                    {{ $toolbarRight }}
                @else
                    <x-user-menu
                        {{ $attributes->mergeThemeProvider($themeProvider, 'user-menu') }}
                        :items="$userMenuItems"
                        :inline="$userMenuInline"
                        :name="$userMenuName"
                        :show="$userMenuShow"
                        :overlay="$userMenuOverlay"
                        :closeable="$userMenuCloseable"
                        :align="$userMenuAlign"
                        :icon-name="$userMenuIconName"
                        :user="$user"
                        :guard="$guard"
                        :user-name="$userMenuUserName"
                        :user-avatar="$userMenuUserAvatar"
                        :avatar-search="$userMenuAvatarSearch"
                        :avatar-provider="$userMenuAvatarProvider"
                        :avatar-fallback="$userMenuAvatarFallback"
                        :avatar-icon="$userMenuAvatarIcon"
                        :theme="$theme"
                    >
                        {{ $userMenu ?? '' }}

                        @isset ($userMenuTrigger)
                            <x-slot name="trigger">
                                {{ $userMenuTrigger }}
                            </x-slot>
                        @endisset

                        @isset ($userMenuAvatar)
                            <x-slot name="avatar">
                                {{ $userMenuAvatar }}
                            </x-slot>
                        @endisset

                        @isset ($userMenuAvatarContent)
                            <x-slot name="avatarContent">
                                {{ $userMenuAvatarContent }}
                            </x-slot>
                        @endisset
                    </x-user-menu>
                @endisset
            </x-slot>
        </x-toolbar>

        <main {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'main') }}>
            <x-container
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}
                :theme="$theme"
            >
                <x-message
                    :session="$messageSession"
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'message') }}
                />

                {{ $slot }}
            </x-container>
        </main>
    </div>
</div>
@if (is_array($html))
    </x-html>
@endif