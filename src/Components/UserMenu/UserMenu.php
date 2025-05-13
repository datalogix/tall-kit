<?php

namespace TALLKit\Components\UserMenu;

use TALLKit\Concerns\User;
use TALLKit\View\BladeComponent;

class UserMenu extends BladeComponent
{
    use User;

    protected array $props = [
        'items' => null,
        'inline' => false,
        'iconName' => null,
        'tooltip' => null,
        'name' => null,
        'show' => false,
        'overlay' => false,
        'closeable' => true,
        'align' => 'right',
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
        $this->setUser(
            user: $this->user,
            guard: $this->guard
        );

        $this->setUserInfo(
            userName: $this->userName,
            userAvatar: $this->userAvatar,
            avatarSearch: $this->avatarSearch,
            avatarProvider: $this->avatarProvider,
            avatarFallback: $this->avatarFallback,
            avatarIcon: $this->avatarIcon,
        );

        $this->items ??= $this->getUserValue('userMenu');
    }

    protected function attrs()
    {
        return [
            'root' => [
                'inline' => $this->inline,
                'name' => $this->name,
                'show' => $this->show,
                'overlay' => $this->overlay,
                'closeable' => $this->closeable,
                'align' => $this->align,
                'items' => $this->items,
            ],

            'trigger' => [
                'user' => $this->user,
                'guard' => $this->guard,
                'user-name' => $this->userName,
                'user-avatar' => $this->userAvatar,
                'avatar-search' => $this->avatarSearch,
                'avatar-provider' => $this->avatarProvider,
                'avatar-fallback' => $this->avatarFallback,
                'avatar-icon' => $this->avatarIcon,
                '@click' => 'toggle',

                'pt' => [
                    'root' => [
                        'pt' => [
                            'text' => [
                                'class' => 'hidden sm:block',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
