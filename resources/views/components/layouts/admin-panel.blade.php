<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <x-sidebar
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'sidebar') }}
        :items="$sidebarItems"
        :breakpoint="$sidebarBreakpoint"
        :name="$sidebarName"
        :show="$sidebarShow"
        :overlay="$sidebarOverlay"
        :align="$sidebarAlign"
        :theme="$theme"
    >
        {{ $sidebar ?? '' }}

        <x-slot name="header">
            <x-logo
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'logo') }}
                :image="$logoImage"
                :name="$logoName"
                :url="$logoUrl"
                :theme="$theme"
            >
                {{ $sidebarHeader ?? '' }}
            </x-logo>
        </x-slot>

        @isset ($sidebarFooter)
            <x-slot name="footer">
                {{ $sidebarFooter }}
            </x-slot>
        @endisset
    </x-sidebar>

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
                    <x-toggler
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'toggler') }}
                        @click="$dispatch('{{ $sidebarName }}-toggle')"
                    >
                        {{ $toggler ?? '' }}
                    </x-toggler>
                @endisset
            </x-slot>

            <x-slot name="right">
                @isset ($toolbarRight)
                    {{ $toolbarRight }}
                @else
                    <x-user-menu
                        :items="$userMenuItems"
                        :inline="$userMenuInline"
                        :name="$userMenuName"
                        :show="$userMenuShow"
                        :overlay="$userMenuOverlay"
                        :align="$userMenuAlign"
                        :iconName="$userMenuIconName"
                        :user="$user"
                        :guard="$guard"
                        :userName="$userMenuUserName"
                        :userAvatar="$userMenuUserAvatar"
                        :avatarSearch="$userMenuAvatarSearch"
                        :avatarProvider="$userMenuAvatarProvider"
                        :avatarFallback="$userMenuAvatarFallback"
                        :avatarIcon="$userMenuAvatarIcon"
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
                    </x-user-menu>
                @endisset
            </x-slot>
        </x-toolbar>

        <main {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'main') }}>
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
                {{ $slot }}
            </div>
        </main>
    </div>
</div>
