<?php

namespace TALLKit\Components\UserSidebar;

use TALLKit\Concerns\User;
use TALLKit\View\BladeComponent;

class UserSidebar extends BladeComponent
{
    use User;

    protected array $props = [
        'items' => [],
        'breakpoint' => 'none',
        'target' => null,
        'name' => 'sidebar',
        'show' => false,
        'overlay' => true,
        'closeable' => true,
        'align'=> 'left',
        'logoImage' => null,
        'logoName' => null,
        'logoUrl' => null,
        'logoRoute' => null,
        'user' => null,
        'guard' => null,
        'userName' => null,
        'userAvatar' => null,
        'avatarSearch' => null,
        'avatarProvider' => null,
        'avatarFallback' => null,
        'avatarIcon' => null,
    ];

    protected function processed(array $data)
    {
        $this->setUser($this->user, $this->guard);
        $this->setUserInfo($this->userName, $this->userAvatar, $this->avatarSearch, $this->avatarProvider, $this->avatarFallback, $this->avatarIcon);

        $this->logoRoute ??= [$this->guard.'.index', $this->guard.'.dashboard', $this->guard.'.home', 'index', 'dashboard', 'home'];
        $this->items ??= $this->getUserValue('sidebar', $this->guard.'Sidebar');
        $this->breakpoint = $this->getUserValue('sidebarBreakpoint', $this->guard.'SidebarBreakpoint') ?? $this->breakpoint;
        $this->name ??= $this->guard ? $this->guard.'-sidebar' : 'sidebar';
    }

    protected function attrs()
    {
        return [
            'root' => [
                'items' => $this->items,
                'breakpoint' => $this->breakpoint,
                'name' => $this->name,
                'show' => $this->show,
                'overlay' => $this->overlay,
                'closeable' => $this->closeable,
                'align' => $this->align,
                'target' => $this->target,
            ],

            'logo' => [
                'class' => 'text-white w-60 p-10',
                'image' => $this->logoImage,
                'name' => $this->logoName,
                'url' => $this->logoUrl,
                'route' => $this->logoRoute,
            ],

            'trigger' => [
                'x-data' => 'window.tallkit.component(\'user-sidebar\')',
                'x-init' => 'setup(\''.$this->name.'\')',
                'class' => 'fixed z-10 bottom-2 right-2 bg-white',
                '@click' => 'click',
                'user' => $this->user,
                'guard' => $this->guard,
                'user-name' => $this->userName,
                'user-avatar' => $this->userAvatar,
                'avatar-search' => $this->avatarSearch,
                'avatar-provider' => $this->avatarProvider,
                'avatar-fallback' => $this->avatarFallback,
                'avatar-icon' => $this->avatarIcon,
            ],
        ];
    }
}
