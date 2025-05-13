<x-tallkit-html
    :attributes="$attrs('html')"
    :props="$props('html')"
    :theme="$theme"
>
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset

    <div {{ $attrs() }}>
        <x-tallkit-user-sidebar
            :items="$menu"
            :user="$user"
            :guard="$guard"
            :attributes="$attrs('sidebar')"
            :props="$props('sidebar')"
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
        </x-tallkit-user-sidebar>

        <div {{ $attrs('box') }}>
            <x-tallkit-toolbar
                :title="$title"
                :attributes="$attrs('toolbar')"
                :props="$props('toolbar')"
                :theme="$theme"
            >
                <x-slot name="left">
                    @isset ($toolbarLeft)
                        {{ $toolbarLeft }}
                    @elseif (
                        $menu->isNotEmpty()
                        || (isset($sidebar) && $sidebar->isNotEmpty())
                        || (isset($sidebarHeader) && $sidebarHeader->isNotEmpty())
                        || (isset($sidebarFooter) && $sidebarFooter->isNotEmpty())
                    )
                        <x-tallkit-button
                            :attributes="$attrs('toggler')"
                            :props="$props('toggler')"
                            :theme="$theme"
                        >
                            {{ $toggler ?? '' }}
                        </x-tallkit-button>
                    @endisset
                </x-slot>

                {{ $toolbar ?? '' }}

                <x-slot name="right">
                    @isset ($toolbarRight)
                        {{ $toolbarRight }}
                    @elseif (isset($userMenuTrigger) || $user || $menu->isNotEmpty())
                        <x-tallkit-button
                            :attributes="$attrs('toggler')"
                            :props="$props('toggler')"
                            :theme="$theme"
                        >
                            {{ $toggler ?? '' }}
                        </x-tallkit-button>

                        <x-tallkit-user-menu
                            :user="$user"
                            :guard="$guard"
                            :attributes="$attrs('user-menu')"
                            :props="$props('user-menu')"
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

                            @isset ($userMenuPrepend)
                                <x-slot name="prepend">
                                    {{ $userMenuPrepend }}
                                </x-slot>
                            @endisset

                            @isset ($userMenuAppend)
                                <x-slot name="append">
                                    {{ $userMenuAppend }}
                                </x-slot>
                            @endisset
                        </x-tallkit-user-menu>
                    @endisset
                </x-slot>
            </x-tallkit-toolbar>

            <main {{ $attrs('main') }}>
                <x-tallkit-container
                    :attributes="$attrs('content')"
                    :props="$props('content')"
                    :theme="$theme"
                >
                    <x-tallkit-messages
                        :attributes="$attrs('messages')"
                        :props="$props('messages')"
                        :theme="$theme"
                    />

                    {{ $slot }}
                </x-tallkit-container>
            </main>
        </div>
    </div>
</x-tallkit-html>
