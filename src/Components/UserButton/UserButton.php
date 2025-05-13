<?php

namespace TALLKit\Components\UserButton;

use TALLKit\Concerns\User;
use TALLKit\View\BladeComponent;

class UserButton extends BladeComponent
{
    use User;

    protected function processed(array $data)
    {
        $this->setUser($this->user, $this->guard);
        $this->setUserInfo(
            $this->userName,
            $this->userAvatar,
            $this->avatarSearch,
            $this->avatarProvider,
            $this->avatarFallback,
            $this->avatarIcon
        );
    }

    protected function attrs()
    {
        return [
            'container' => [
                'color' => 'none',
            ],

            'icon' => [
                'class' => 'w-8 h-8 rounded-full overflow-hidden bg-indigo-700 text-white shadow flex items-center justify-center font-bold',
            ],

            'avatar' => [
                'src' => $this->userAvatar,
                'search' => $this->avatarSearch,
                'provider' => $this->avatarProvider,
                'fallback' => $this->avatarFallback,
                'icon' => $this->avatarIcon,
            ],
        ];
    }
}
