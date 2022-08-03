<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\User;

class UserButton extends BladeComponent
{
    use User;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable|mixed|null  $user
     * @param  string|null  $guard
     * @param  string|bool|null  $userName
     * @param  string|bool|null  $userAvatar
     * @param  string|bool|null  $avatarSearch
     * @param  string|bool|null  $avatarProvider
     * @param  string|bool|null  $avatarFallback
     * @param  string|bool|null  $avatarIcon
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $user = null,
        $guard = null,
        $userName = null,
        $userAvatar = null,
        $avatarSearch = null,
        $avatarProvider = null,
        $avatarFallback = null,
        $avatarIcon = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setUser($user, $guard);
        $this->setUserInfo($userName, $userAvatar, $avatarSearch, $avatarProvider, $avatarFallback, $avatarIcon);
    }
}
